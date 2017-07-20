<?php

$config = [

		'add_article_rules'		=>	[
														[
															'field'	=>	'title',
															'label'	=>	'Article Title',
															'rules'	=>	'required|alphadash'
														],
														[
															'field'	=>	'body',
															'label'	=>	'Article Body',
															'rules'	=>	'required',
														]
									],
		'admin_login'			=>	[
														[
															'field'	=>	'username',
															'label'	=>	'User Name',
															'rules'	=>	'required|alpha|trim',
														],
														[
															'field'	=>	'password',
															'label'	=>	'Password',
															'rules'	=>	'required',
														]
									],
		'signup'				=>	[
														[
															'field'	=>	'uname',
															'label'	=>	'User Name',
															'rules'	=>	'required|alpha|trim',
														],
														[
															'field'	=>	'pword',
															'label'	=>	'Password',
															'rules'	=>	'required',
														],
														[
															'field'	=>	'fname',
															'label'	=>	'First Name',
															'rules'	=>	'required',
														],
														[
															'field'	=>	'email',
															'label'	=>	'Email',
															'rules'	=>	'required',
														]
									],
		'profile'				=>	[
														[
															'field'	=>	'uname',
															'label'	=>	'User Name',
															'rules'	=>	'required|alpha|trim',
														],
														[
															'field'	=>	'fname',
															'label'	=>	'First Name',
															'rules'	=>	'required',
														],
														[
															'field'	=>	'email',
															'label'	=>	'Email',
															'rules'	=>	'required',
														]
									]


];