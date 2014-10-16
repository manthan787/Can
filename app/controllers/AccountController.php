<?php


class AccountController extends BaseController{

	public function __construct(){
		parent::__construct();
		$this->beforeFilter('guest',['except'=>['getSignout','getChangePassword','postChangePassword','getU']]);
		$this->beforeFilter('auth.check',['only'=>['getSignout','getChangePassword','postChangePassword','getU']]);
	}
	
	public function getCreate(){
		$states=State::lists('state','id');
		return View::make('Account.create')->with('states',$states);
	}

	public function postCreate(){
		$v=Validator::make(Input::all(),User::$rules);
		if($v->passes())
		{
			$user=new User;
			$user->firstname=Input::get('firstname');
			$user->lastname=Input::get('lastname');
			$user->phone=Input::get('phone');
			$user->email=Input::get('email');
			$user->password=Hash::make(Input::get('password'));
			$user->address=Input::get('address');
			$user->city=Input::get('city');
			$user->state_id=Input::get('state');
			$user->PIN=Input::get('PIN');
			$user->save();
		return Redirect::to('/')->with('success','Account Successfully created. <b><a href="/account/signin">Log In!</a></b>');	
		}
		return Redirect::to('account/create')
		->withErrors($v)
		->withInput()
		->with('danger','Looks like something went wrong! Please Try Again!');
	}

	public function getSignin(){
		return View::make('Account.signin');
	}

	public function postSignin(){
		$v=Validator::make(Input::all(),['email'=>'required','password'=>'required']);
		if($v->passes())
		{
			$auth=Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')],TRUE);
			if($auth)
			{
				if(Session::has('cart'))
					{
						$order=Order::where('user_id',Auth::user()->id)->where('c',0)->where('abandoned',0)->first();
						if(isset($order))
						{
							$order->abandoned=1;
							$order->save();
						}
						$o=Order::find(Session::get('cart'));
						$o->user_id=Auth::user()->id;
						$o->save();
						Session::forget('cart');
						return Redirect::to('/');
					}
					return Redirect::to('/');
			}
			else
			{
				return Redirect::to('/account/signin')->with('danger','Oops! Could not log you in! Make sure Your credentials are correct');
			}
		}
		return Redirect::to('/account/signin')->withErrors($v)->withInput();

	}

	public function getSignout(){

		Auth::logout();
		return Redirect::to('/');
	}

	public function getChangePassword(){
		return View::make('Account.change');
	}

	public function postChangePassword(){
		$v=Validator::make(Input::all(),['old_password'=>'required', 'password'=>'required','password_again'=>'same:password']);
		if($v->fails()){
			return Redirect::to('account/change-password')->withErrors($v)->with('message','There has been a problem while changing passwords!')->withInput();
		}
		else
		{
			$user=User::find(Auth::user()->id);
			$old_password=Input::get('old_password');
			$password=Input::get('password');
			if(Hash::check($old_password, Auth::user()->password))
			{
				$user->password=Hash::make($password);
				if($user->save()){
					return Redirect::to('/')->with('success','Your Password has been changed Successfully!');
				}
				else{
					return Redirect::to('/account/change-password')->with('danger','Something went wrong terribly! Please Try Again.');
				}
			}
			else{
				return Redirect::to('/account/change-password')
				->with('danger','Please Type In Correct Old Password!')
				->withInput();
			}
		}
	}
	public function getU($id){

		$user=User::where('id',$id)->first();
		if($user)
		{
			return 'hi '.$user->firstname;
		}
		else{
			return 'User Not Found!';
		}
	}

	public function getRecover(){
		return View::make('Account.recover');
	}

	public function postRecover(){
		$v=Validator::make(Input::all(),['email'=>'required|email']);
		if($v->fails())
		{
			return Redirect::to('/account/recover')->withErrors($v)->withInput()->with('message','Oops! Something Went Wrong!');
		}
		else
		{
			$user=User::where('email',Input::get('email'))->get();
			if($user->count())
			{
				
				$user=$user->first();
				$code=str_random(60);
				$password=str_random(10);

				$user->code=$code;
				$user->password_temp=Hash::make($password);
				$link=URL::route('account.recovery',$code);
				if($user->save()){
				Mail::send('emails.auth.recover',['link'=>$link,'username'=>$user->username,'password'=>$password],function($message) use ($user){

					$message->to($user->email,$user->username)->Subject('Password Recovery!');

				});

				return Redirect::to('/')->with('success','A Temporary Password has been mailed to you.');
				}
				else{
					return Redirect::to('/account/recover')->with('message','Something went terribly wrong, please try again!');
				}

			}
			else{
				return Redirect::to('/account/recover')->with('danger','The Account Does NOT Exist!');
			}
		}
	}

	public function getRecovery($code){

		$user=User::where('code',$code)->first();
		if($user){
			$user->code='';
			$user->password=$user->password_temp;
			$user->password_temp='';
			if($user->save()){
				return Redirect::route('home')->with('success','Account Successfully Recovered. Change your password now!');
			}
			else{
				return Redirect::route('home')->with('message','Something went terribly wrong!');
			}
		}
		else{
			return Redirect::route('home')->with('message','Invalid Link!');
		}
	}

	
}