# **PHP Form Builder with Bootstrap by Cleyam**

This PHP class will help you easily create HTML forms with a Bootstrap 4.4 layout. The class has built-in fluent methods to ease the creation of any kind of forms, with default layouts which can still be personalized.

## **How to setup**

* Copy the /vendor directory inside your project.

* To benefit from Bootstrap 4.4 layouts, make sure to use the following CDN for Bootstrap & JQuery :
https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css
https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js
https//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js

or to use the libraries provided in the /libs directory.

## **Working with the Form Builder**

To create a form :

1-	Instantiate a new object with the « Form » class wherever you want in your HTML, and make sure to set its parameters.

   **Parameter 1** is the name of the form.

   **Parameter 2** is the method used with the form ( GET, POST, etc ).

   **Parameter 3** is optional, and let you choose the form’s action.

Exemple
```php
$newForm = new Form('test','POST');
```
 
2-	To display the form in the HTML, start the next instruction with an echo, then use the fluent methods provided with the « Form » class in any order you want, starting with formStart() and ending with formEnd(). 

Exemple
```php
echo $newForm->formStart() // Always start like this
 ->label('Name','Name')->input('Name', 'text')
 ->label('Surname','Surname')->input('Surname', 'text')
 ->label('Email','Email')->input('Email', 'email')
 ->label('Password','Password')->input('Password', 'password')
 ->select('Choice', $select)
 ->textarea('Message')
 ->checkbox('check','check', 'Check-me !')
 ->radio('testRadio', $testGroup)
 ->groupCheckbox($testGroup)
 ->submitButton('Submit')
->formEnd(); // Always end like this
```

