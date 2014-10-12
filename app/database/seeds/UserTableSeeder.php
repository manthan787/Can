<?php


class UserTableSeeder extends Seeder{

	public function run(){
		$user=new User;
		$user->firstname='Bhavik';
		$user->lastname='Patel';
		$user->email='bhavik.patel.3705@facebook.com';
		$user->password=Hash::make('admin');
		$user->admin=1;
		$user->save();
		
	}
}