# **PHP/Bootstrap Form Builder by Cleyam**

This PHP class will help you easily create HTML forms with a Bootstrap 4.4 layout. The class has built-in fluent methods to ease the creation of any kind of forms, with default layouts which can still be personalized.

## **How to setup**

* Copy the /vendor directory inside your project.

* To benefit from Bootstrap 4.4 layouts, make sure to use the libraries provided in the /libs directory, or to use the following CDN for Bootstrap & JQuery :

> https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css

> https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js

> https//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js


## **Working with the Form Builder**

To create a form :

1-	Instantiate a new object with the « Form » class wherever you want in your HTML, and make sure to set its parameters.

    `name: is the name of the form.`
    `action: empty by default, submit to current url`
    `method: POST by default`
    `id:empty by default`

Exemple
```php
$newForm = new Form('test');
```
 
2-	To display the form in the HTML, start the next instruction with an echo, then use the fluent methods provided with the « Form » class in any order you want, starting with formStart() and ending with formEnd(). All methods are listed below, and are customizable if you don't want to keep the default Bootstrap layout.

Exemple
```php
echo $newForm->formStart() // Always starts like this
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
->formEnd(); // Always ends like this
```


## **Methods & options**



#### formStart
You don't have to set parameters if you want to use the default layout. The form attributes are already set when you instantiate the class, and will be automatically used here.
`cardCSS` - Default is 'card mx-2 my-2'
`cardHeaderCss` - Default is 'card-header bg-dark text-white'
`cardBodyCss` - Default is 'card-body'
`formCss` - Default is 'mx-2 my-2'