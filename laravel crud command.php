####laravel crud command
composer create-project --prefer-dist laravel/laravel example-app
cd example-app
php artisan serve
copy ip address and run into browser
# make first page
use route(web.php)


Route::get('/firstpage', function () {
    return view('firstview');
});

# make controller 

php artisan make:controller Hellocontroller

add controller path into route mandatory
Route::get('/hello', [Hellocontroller::class, 'example']);


php artisan migrate --path='database/migration/file-name'

{{url('group/$id/integration-settings')}}


**** CRUD Using Query Builder ***
# Insert
DB::table('post')->insert([
            'title'=> 'First Post',
            'descr'=> 'Lorem Lipsum',
            'category'=> 'fcategory' 
        ]);

# Get All Records

    $products = DB:: table('post')->get();

        return $products; 
    

# Update

     DB::table('post')
                    ->where('id',1)
                    ->update([

                        'title'=> '353 First Post',
                        'descr'=> '765 Lorem Lipsum',
                        'category'=> 'dfhg fcategory' 

                    ]);

# Delete

     DB:: table('post')
                        ->where('id',$id)
                        ->delete();



#### Create controller,model and table using single command
        php artisan make:model modelname -mcr

** Now Migrate table after added string and int type in migration table
use php artisan migrate --path=/database/migrations/2021_09_06_104515_create_registers_table.php



#### Validation

$request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),   
        ]);
       

#### Check Data in database
$arr=Register::where(['email'=>$request->post('email')])->get();

         $Record_Count = count($arr); 

        if($Record_Count > 0)
        {
            
            $msg='Already Registered Please Login!';

          
        } 
        else 
        {
                $model= new Register();
            $msg= 'Registration Successful';
        }


#####
 This is for auto create login and register form 
 
composer create-project laravel/laravel laravel8

cd laravel8

composer require laravel/ui

php artisan ui vue --auth

npm install

npm fund

npm run dev

if(you face any error)

use this steps
step1:
npm cache clean --force
Step2:

delete node_modules folder
delete package-lock.json file
npm install



***** Integrity constraint violation: 1048 Column 'privacy' cannot be null or Fix null value error use this in ?? '' after user value eg:
$model->privacy = $request->post('privacy') ?? '';



****** Understanding managing Linux servers & AWS/GCP ******



##### PHP ARTISAN COMMAND IN LARAVEL
*** Create laravel project ***

composer create-project laravel/laravel project_name

1. php artisan serve (to start your project)
2. php artisan make:controller Controllername
3. php artisan make:model Controllername -mcr (this command make controller,model simultaneously)
4. php artisan migrate --path=/database/migrations/2021_09_06_104515_create_registers_table.php (migrate table into database)
5. php artisan serve --port=8080 (If you want to run the project diffrent port so use this command) 
6. php artisan route:list (list all route)
7. php artisan ui vue –auth. (This command will create some default views blade, controllers and routes. that is a help to login and register users.how to create a login and register the auth system using one command name )


**** Include File 
@extends('pagename')  (mangae whole header & footer code using single page inside this add @section('container'))

use @section('container') in file where you include header and footer


***** How to Send Email in Laravel App with Example

Install Laravel Setup
Configuration SMTP in .env
Create Controller & Method
Create Route & Blade View
Start Development Server

Note: use mail; add this code in your controller

then add below code inside your controller

    public function sendEmail()
    {
        $data['title'] = "This is Test Mail Tuts Make";
 
        Mail::send('emails.email', $data, function($message) {
 
            $message->to('tutsmake@gmail.com', 'Receiver Name')
 
                    ->subject('Tuts Make Mail');
        });
 
        if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
         }else{
           return response()->success('Great! Successfully send in your mail');
         }
    }

Note: Here (emails.email) this


### Insert Data into database after vaidation

$request->validate(
            [
                'name' => 'required',
                'password' => 'required|min:5',
                'email' => 'required|email|unique:users'
            ], 
            [
                'name.required' => 'Name is required',
                'password.required' => 'Password is required'
            ]
          );
    
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

Note: above code use when you have all column data otherwise use below code to insert data into database

    $model= new model_name();

    $model->column_name=$request->post('form_column_name');
    so on...

    $model->save();

    // If You want to display message then use below code

    $request->session->('success_message','Data Successfully Inserted');



### Return Back to same page and display success message then use below command

 return back()->with('success', 'User created successfully.');

 #### for Display this message on page use below command

  @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif



### Route Definition

Domain | Method   | URI                                          | Name                                                           | Action                                                                           | Middleware |
+--------+----------+----------------------------------------------+----------------------------------------------------------------+----------------------------------------------------------------------------------+------------+
|        | GET|HEAD | /                                            |                                                                | App\Http\Controllers\AdminController@index                                       | web        |
|        | GET|HEAD | admin                                        |                                                                | App\Http\Controllers\AdminController@index                                       | web        |
|        | POST     | admin/auth                                   | admin.auth                                                     | App\Http\Controllers\AdminController@auth                                        | web        |
|        | GET|HEAD | admin/dashboard                              |                                                                | App\Http\Controllers\AdminController@dashboard                                   | web        |



***** Add Custom Error *****

 $rules = [
        'rname' => 'required',
        'remail' => 'required|remail',
        'idate' => 'required',
        'gr_id' => 'required',
        ];

            $customMessages = [
            'rname.required' => 'Please Enter Recipient Name',
            'remail.required' => 'Please Enter Recipient Email',
            'idate.required' => 'Please Choose Issue Date',
            'gr_id.required'  => 'Please Choose Group ',
              ];

    $this->validate($request, $rules, $customMessages);



// File Upload

   if($request->hasfile('file'))
        {
            $file=$request->file('file');
            $cext=$file->extension();
            $file_name=time().'.'.$cext;
            $file->storeAs('/public/media/design/',$file_name);
            $model->file=$file_name;
        } 



// Join Query
$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
