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

* #### formStart
This method is **mandatory** and **must be used first**. You don't have to set parameters if you want to use the default layout. The form attributes are already set when you instantiate the class, and will be automatically used here.


* #### formStart
You don't have to set parameters if you want to use the default layout. The form attributes are already set when you instantiate the class, and will be automatically used here.

`cardCSS` - Default is 'card mx-2 my-2'

`cardHeaderCss` - Default is 'card-header bg-dark text-white'

`cardBodyCss` - Default is 'card-body'

`formCss` - Default is 'mx-2 my-2'



* #### formEnd
This method is **mandatory** and **must be used last**. It doesn't take any parameters, and will return all previous methods as the $form attribute of the class. 


* #### input
This method let you build an input in your form. The `name` and `type` parameters must be set.

`name` - Must be set. 

`type` - Must be set ( text, email, password, hidden, etc )

`id` - Empty by default.

`placeholder` - Empty by default.

`inputCss` - 'form-control mr-2 mb-2' by default.


* #### label
This method let you build an label in your form. The `name` and `for` parameters must be set.

`name` - Must be set. 

`for` - Must be set ( You'll need to make it identical to the input's id it is linked to )

`labelCss` - 'mr-2 mb-2' by default.


* #### submitButton
This method let you build an submit button in your form. The `name` parameter must be set.

`name` - Must be set. 

`submitCss` - 'btn btn-dark float-right mt-2' by default.


* #### select
This method let you build an select input with as many options as you want in your form. The `name` and `options` parameters must be set.

`name` - Must be set. 

`options` - Must be set and be an array, containing all the options you want in your select input.


* #### textarea
This method let you build an text area in your form. The `name` parameter must be set.

`name` - Must be set. 

`placeholder` - Empty by default.

`rows` - 5 by default.

`textareaCss` - 'form-control mr-2 mb-2' by default.


* #### checkbox
This method let you build an checkbox in your form. The `name` and `label` parameters must be set.

`name` - Must be set. 

`label` - Must be set. 

`checkboxInputCss` - 'form-check-input' by default.

`checkboxLabelCss` - 'form-check-label' by default.

`checkboxId` - Empty by default.


* #### groupCheckbox
This method let you build an group checkbox input in your form. The `idLabelCheckbox` parameter must be set.

`idLabelCheckbox` - Must be set. It must be an array with keys and values. The keys will set id for each inputs, and the for attribute for corresponding labels. The values will set the name attribute of each input, and what text is displayed by each label.

`groupCheckboxInputCss` - 'form-check-input' by default.

`groupCheckboxLabelCss` - 'form-check-label' by default.


* #### radio
This method let you build an radio input in your form. The `name` and `idLabelRadio` parameters must be set.

`name` - Must be set. 

`idLabelRadio` - Must be set. It must be an array with keys and values. The keys will set id and value for each inputs, and the for attribute for corresponding labels. The values will set the name attribute of each input, and what text is displayed by each label.

`radioInputCss` - 'form-check-input' by default.

`radioLabelCss` - 'form-check-label' by default.
