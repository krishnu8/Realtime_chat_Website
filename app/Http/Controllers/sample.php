<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\user__data;
use App\Models\friends;
use App\Models\requests;
use App\Models\contact;
use App\Models\message;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class sample extends Controller
{
    // login check
    public function login(Request $req)
    {
        $email = $req->Email;
        $pass = $req->Password;
        $result = user__data::where('Email', $email)
            ->where('Password', $pass)
            ->count();

        if ($result == 1) {
            $result1 = user__data::where('Email', $email)->first();
            Session::put('User_id', $result1->User_id);
            return redirect('Home');
        }
        session()->flash('error', 'Enter Valid Email or Password.');
        return redirect('login');
    }

    //registration form
    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|email',
            'pwd' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'pwd1' => 'required|same:pwd',
        ]);

        DB::table('user__data')->insert([
            'created_at' => Carbon::now('Asia/Kolkata'),
            'updated_at' => Carbon::now('Asia/Kolkata'),
            'Name' => $req->name,
            'Email' => $req->email,
            'Password' => $req->pwd,
            'Status' => 'Active',
            'Privacy' => 'Public',
            'Picture' => 'Deafult.png',
        ]);
        return view('login');
    }

    // total friend home page
    public function friend()
    {
        $User_id = session('User_id');
        $result = friends::where('User1', $User_id)
            ->orwhere('User2', $User_id)
            ->get();
        $friend_data = [];
        foreach ($result as $r) {
            if ($r['User2'] == $User_id) {
                $friend_data[] = $r['User1'];
            } else {
                $friend_data[] = $r['User2'];
            }
        }
        $user_info = user__data::whereIn('User_id', $friend_data)->get();
        return view('Home', compact('user_info'));
    }
    //  chat page
    public function open_chat($id)
    {
        $User_id = session('User_id');

        $friend = friends::where(function ($query) use ($User_id) {
            $query->where('User1', $User_id)->orwhere('User2', $User_id);
        })
            ->whereNull('blocked_by')
            ->get();

        // $blockedFriends = friends::whereNotNull('blocked_by')->get();

        // $bocked_id=[];
        // foreach ($blockedFriends as $k) {
        //     if($k['blocked_by']==$k['User1']){
        //         $bocked_id[] = $k['User2'];
        //     }else{
        //         $bocked_id[] = $k['User1'];
        //     }
        //     $bocked_id[]=$k['blocked_by'];
        // }

        $friend_data = [];
        foreach ($friend as $r) {
            if ($r['User2'] == $User_id) {
                $friend_data[] = $r['User1'];
            } else {
                $friend_data[] = $r['User2'];
            }
        }

        $chatfriend = message::where('Sender_id', $User_id)
            ->orwhere('Reciver_id', $User_id)
            ->get();

        $chat_data = [];
        foreach ($chatfriend as $r) {
            if ($r['Sender_id'] == $User_id) {
                $chat_data[] = $r['Reciver_id'];
            } else {
                $chat_data[] = $r['Sender_id'];
            }
        }

        // filtering the data which are present in chat data as well as in frinddata
        $filtered_friend_data = array_diff($friend_data, $chat_data);
        // check for bocked user
        // $friend_nonblock=array_diff($filtered_friend_data, $bocked_id);

        $chatfriend = user__data::whereIn('User_id', $chat_data)->get();

        $friend = user__data::whereIn('User_id', $filtered_friend_data)->get();

        $data = user__data::where('User_id', $id)->first();

        $ownpicture = user__data::where('User_id', $User_id)->first();

        return view('Chat', compact('chatfriend', 'friend', 'data', 'id', 'ownpicture'));
    }
    // fetch messages
    public function fetch_message($id)
    {
        $User_id = session('User_id');

        $messages = message::where('Sender_id', $User_id)
            ->where('Reciver_id', $id)
            ->where('Deleted_by', '!=', $User_id)
            ->orWhere(function ($query) use ($id, $User_id) {
                $query
                    ->where('sender_id', $id)
                    ->where('Reciver_id', $User_id)
                    ->where('Deleted_by', '!=', $User_id); //->where('Deleted_by', '!=', $User_id)
            })
            ->get();

        return response()->json($messages);
    }
    // insert message to database
    public function send_message(Request $request)
    {
        try {
            $Sender_id = session('User_id');
            $Reciver_id = $request->input('id');
            $message = $request->input('message');

            $newMessage = new message();
            $newMessage->Reciver_id = $Reciver_id;
            $newMessage->Sender_id = $Sender_id;
            $newMessage->Message = $message;
            $newMessage->created_at = Carbon::now('Asia/Kolkata');
            $newMessage->updated_at = Carbon::now('Asia/Kolkata');
            $newMessage->save();

            // $friend_last_message = friends::where(function ($query) use ($Sender_id, $Reciver_id) {
            //     $query->where([['User1', $Sender_id], ['User2', $Reciver_id]])->orWhere([['User1', $Reciver_id], ['User2', $Sender_id]]);
            // })->first();

            // if ($friend_last_message) {
            //     $friend_last_message->update([
            //         'Last_message' => $message,
            //         'Message_date' => Carbon::now('Asia/Kolkata'),
            //     ]);
            // }

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            \Log::error('Error: ' . $e->getMessage());
            return response()->json(['status' => 'error']);
        }
    }
    // delete conversation
    public function delete_conversation($id)
    {
        $User_id = session('User_id');

        $delete_messages = Message::where(function ($query) use ($User_id, $id) {
            $query->where('Sender_id', $User_id)->where('Reciver_id', $id);
        })
            ->orWhere(function ($query) use ($User_id, $id) {
                $query->where('Sender_id', $id)->where('Reciver_id', $User_id);
            })
            ->get();

        foreach ($delete_messages as $msg) {
            if ($msg['Deleted_by'] == $id) {
                $msg->delete();
            } else {
                $msg->update(['Deleted_by' => $User_id]);
            }
        }
        return redirect()->action([sample::class, 'open_chat'], ['id' => $id]);
    }

    // Add_friend page
    public function Add_friend()
    {
        $User_id = session('User_id');
        $result = friends::where('User1', $User_id)
            ->orwhere('User2', $User_id)
            ->get();
        $friend_data = [];
        foreach ($result as $r) {
            if ($r['User2'] == $User_id) {
                $friend_data[] = $r['User1'];
            } else {
                $friend_data[] = $r['User2'];
            }
        }
        $friend_data[] = $User_id;
        $user_info = user__data::whereNotIn('User_id', $friend_data)
            ->orderBy('User_id', 'desc')
            ->take(10)
            ->get();

        $send_requests_check = requests::where('Sender_id', $User_id)->get();

        $friend_request_receive = requests::where('Reciver_id', $User_id)->get();
        $friend_request_receive_count = $friend_request_receive->count();

        $request_data = [];
        foreach ($friend_request_receive as $request_receive) {
            if ($request_receive['Reciver_id'] == $User_id) {
                $request_data[] = $request_receive['Sender_id'];
            }
        }
        
        $friend_request_receive1 = user__data::whereIn('User_id', $request_data)->get();
        return view('Add_friend', compact('user_info', 'send_requests_check', 'friend_request_receive1', 'friend_request_receive_count'));
    }

    // Search Add_frined
    public function Search_Add_friend(Request $req)
    {
        $User_id = session('User_id');
        $searchName = $req->input('search_name');

        $search_result = user__data::where('user_id', '<>', $User_id)
            ->where('Name', 'like', '%' . $searchName . '%')
            ->take(8)
            ->get();
        $search_result_count = $search_result->count();
        $send_requests_check = requests::where('Sender_id', $User_id)->get();

        return view('Add_friend_search', compact('search_result', 'search_result_count', 'send_requests_check'));
    }

    // add friend send request
    public function Send_friend_request($id)
    {
        $User_id = session('User_id');
        DB::table('requests')->insert([
            'Sender_id' => $User_id,
            'Reciver_id' => $id,
            'created_at' => Carbon::now('Asia/Kolkata'),
            'updated_at' => Carbon::now('Asia/Kolkata'),
        ]);
        return redirect()->action([sample::class, 'Add_friend']);
    }

    // cancle friend request
    public function friend_request_cancle($id)
    {
        $User_id = session('User_id');
        DB::table('requests')
            ->where('Reciver_id', $id)
            ->where('Sender_id', $User_id)
            ->delete();
        return redirect()->action([sample::class, 'Add_friend']);
    }

    // confirm friend request
    public function confirm_request($id)
    {
        $User_id = session('User_id');
        DB::table('friends')->insert([
            'User1' => $id,
            'User2' => $User_id,
            // 'Status' => 'Active',
        ]);

        DB::table('requests')
            ->where('Reciver_id', $User_id)
            ->where('Sender_id', $id)
            ->delete();

        return redirect()->action([sample::class, 'Add_friend']);
    }
    // Delete friendRequest
    public function Delete_request($id)
    {
        $User_id = session('User_id');

        DB::table('requests')
            ->where('Reciver_id', $User_id)
            ->where('Sender_id', $id)
            ->delete();

        return redirect()->action([sample::class, 'Add_friend']);
    }
    //Delete friend
    public function delete_friend($id)
    {
        $User_id = session('User_id');
        DB::table('friends')
            ->where(function ($query) use ($User_id, $id) {
                $query->where('User1', $User_id)->where('User2', $id);
            })
            ->orWhere(function ($query) use ($User_id, $id) {
                $query->where('User1', $id)->where('User2', $User_id);
            })
            ->delete();

        return redirect()->action([sample::class, 'friend']);
    }
    // others profile
    public function other_profile($id)
    {
        $User_id = session('User_id');
        $info = user__data::where('user_id', $id)->first();

        $friend_count = DB::table('friends')
            ->where(function ($query) use ($User_id, $id) {
                $query->where('User1', $User_id)->where('User2', $id);
            })
            ->orWhere(function ($query) use ($User_id, $id) {
                $query->where('User1', $id)->where('User2', $User_id);
            })
            ->count();

        $send_requests_check = requests::where('Sender_id', $User_id)
            ->where('Reciver_id', $id)
            ->count();

        return view('others_profile', compact('info', 'friend_count', 'send_requests_check'));
    }
    // contact
    public function contact(Request $req)
    {
        $req->validate([
            'name' => 'required|min:3|max:15',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:8|',
        ]);

        DB::table('contact')->insert([
            'created_at' => Carbon::now('Asia/Kolkata'),
            'updated_at' => Carbon::now('Asia/Kolkata'),
            'Name' => $req->name,
            'Email' => $req->email,
            'Subject' => $req->subject,
            'Message' => $req->message,
        ]);
        session()->flash('Data_uploaded', 'Enter Valid Email or Password.');
        return view('support');
    }
    // profile
    public function profile()
    {
        $User_id = session('User_id');
        $user_info = user__data::where('user_id', $User_id)->first();
        return view('Profile', compact('user_info'));
    }
    // edit_profile_data
    public function edit_profile_data()
    {
        $User_id = session('User_id');
        $user_info = user__data::where('user_id', $User_id)->first();
        return view('edit_profile', compact('user_info'));
    }
    // edit profile
    public function edit_profile(Request $req)
    {
        $User_id = session('User_id');
        $req->validate(
            [
                'name' => 'required|min:3|max:15',
                'email' => 'required|email',
                'address' => 'required',
                'gen' => 'required',
                'date' =>
                    'required|before:' .
                    \Carbon\Carbon::now()
                        ->subYears(12)
                        ->format('Y-m-d'),
            ],
            [
                'name.required' => 'Enter your Name.',
                'name.min' => 'Name must have atleast 3 character',
                'name.max' => 'Name must have less than 16 character',
                'email.email' => 'Enter valid Email Address',
                'email.required' => 'Email field cannot be empty',
                'address.required' => 'Address field cannot be empty',
                'gen.required' => 'Choose Your Gender or you are sanjay',
                'date.required' => 'Enter your Birth Date',
                'date.before' => 'The user must have to be 12 year or more',
            ],
        );

        User__Data::where('User_id', $User_id)->update([
            'updated_at' => Carbon::now('Asia/Kolkata'),
            'Name' => $req->name,
            'Email' => $req->email,
            'Address' => $req->address,
            'Gender' => $req->gen,
            'D/O/B' => $req->date,
            'Privacy' => $req->privacy,
            'Bio' => $req->des,
        ]);
        return redirect('profile');
    }

    public function update_profile_pic(Request $req)
    {
        $User_id = session('User_id');
        $req->validate(
            [
                'pic' => 'required|mimes:jpg,png,jpeg,webp|max:5120',
            ],
            [
                'pic.required' => 'Picture is required.',
                'pic.mimes' => 'Picture types must be jpg, png, jpeg, or webp',
                'pic.max' => 'Picture size must be less than 5MB',
            ],
        );

        if ($req->hasFile('pic')) {
            $file = $req->file('pic');

            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $req->pic->move('pictures/users/', $filename);

            $pic_data = User__Data::where('User_id', $User_id)->first();

            if ($pic_data['Picture'] != 'Deafult.png') {
                $previousFilePath = 'pictures/' . $pic_data['Picture']; // Example path

                if (File::exists($previousFilePath)) {
                    File::delete($previousFilePath);
                }
            }

            User__Data::where('User_id', $User_id)->update([
                'Picture' => 'users/' . $filename,
            ]);
            session()->flash('pic_update', 'Profile picture updated successfully.');
        }

        return redirect('profile');
    }

    public function change_password(Request $req)
    {
        $User_id = session('User_id');
        $user_info = user__data::where('user_id', $User_id)->first();

        $req->validate([
            'cp' => 'required',
        ]);

        if ($user_info['Password'] == $req->cp) {
            $req->validate(
                [
                    'cp' => 'required',
                    'np' => 'required|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                    'cnp' => 'same:np',
                ],
                [
                    'np.required' => 'Enter Password, Password cannot be Empty',
                    'np.regex' => 'Password must be atlest 8 character,1:uppercase,1:lowercase,1:symbol,1:Number',
                    'cnp.same' => 'Enter same as Above',
                ],
            );

            User__Data::where('User_id', $User_id)->update([
                'Password' => $req->cnp,
            ]);

            session()->flash('Pass_up', 'Password updated successfully.');
        } else {
            session()->flash('Pass_fail', 'Failed to update password.');
        }
        return view('change_password');
    }

    // search
    public function search(Request $request)
    {
        $results= user__data::where('Name', 'like', '%' . $request->search . '%')->take(2)->get();

        return response()->json($results);
    }
    // logout destroy session
    public function destroySession()
    {
        session()->flush();

        return view('login');
    }
}
