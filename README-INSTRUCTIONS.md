- npm install : run commands for buiding assets
- composer require laravel/ui : lybrary for scaffolding
- php artisan ui bootstrap --auth : create files for auth
- move <script src="{{ asset('js/app.js') }}"></script> to bottom body, delete defer
- npm run development : buiding assets for new scaffolding
- create database and add to .env
- php artisan migrate : run create migrations for users
- php artisan make:controller ContactsController --resource : create CRUD controller
- change $id with Contact $contact for methods edit , destroy & update, add -> use App\Contact;
- Route::resource('contacts', 'ContactsController'); : in web, generates all crud routes, view with: php artisan route:list
- php artisan make:model Contact  : // selfexp
- create views, in folder contacts , return in controller , get just return view
- form view with <form ... enctype="multipart/form-data"> and input type='file' for picture , ACHTUNG! route name in action
- php artisan make:migration create_contacts_table : and fill all &->required() ->nullable()
- php artisan migrate : create table in db
- php artisan make:request ContactRequest : for validation creates in app/http/requests a class with ContactRequest, !!! to use instead of Request in ContactsController !!!
- add use App\Http\Requests\ContactRequest; to ontactsController 
- change authorize() return true , add elements to rules() return array.
!! Achtung !! , if ContactRequest does not match validation, the page is redirected automatically from method store to the old view, passing errors, without to hit 1 line of code in the body of the function !!
- add error handling, and {{old('value')}} to previous view , here contacts.create.
- for mass assignment add $fillable[]
- $a=Contact::create($req->validated()); && return redirect()->back()->with('message','...');

Add Join with User
- php artisan make:migration add_user_id_column_to_contacts_table : selfex migration 
- Add foreign key reference to table users : in method up() Schema::table
       $table->unsignedBigInteger('user_id')->default(1); 
       $table->foreign('user_id')->references('id')->on('users');
- method down() to cancel only one column:
    $table->dropForeign(['user_id']);
    $table->dropColumn('user_id');
-Add relation in models:
    add @ User : public function contacts(){ return $this->hasMany('App\Contact');
    add @ Contact : public function user(){return $this->belongsTo(App\User);
- php artisan migrate
- add user_id to $fillable in Contact, to use mass assignment
- inport : use Illuminate\Support\Facades\Auth;
    $contact = Contact::create([
        ...
        'img'=>$req->file('img')->store('public/img'),
        'user_id'=>Auth::id()
- php artisan storage:link : create link folder for images in public for user
- {{ Storage::url($contact->img) }} : in img src in view
    

