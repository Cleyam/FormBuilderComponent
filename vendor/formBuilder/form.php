<?php

namespace FormBuilder;

class FormBuilder
{
    protected $form;
    protected $name;
    protected $action;
    protected $method;
    protected $id;



    /**
     * To use the "Form" class, the name of the form must be set. The method is POST by default, action and id are blank by default.
     *
     * @param [type] $name
     * @param string $action
     * @param string $method
     * @param string $id
     */
    public function __construct($name, $action = '', $method = 'POST', $id = '')
    {
        $this->setName($name);
        $this->setAction($action);
        $this->setMethod($method);
        $this->setId($id);
    }

    /**
     * Starts the form.
     *
     * @param string $cardCss
     * @param string $cardHeaderCss
     * @param string $cardBodyCss
     * @param string $formCss
     * @return self
     */
    public function formStart($cardCss = 'card mx-2 my-2', $cardHeaderCss = 'card-header bg-dark text-white', $cardBodyCss = 'card-body', $formCss = 'mx-2 my-2'): self
    {
        $formStart =  "<div class='$cardCss'><div class='$cardHeaderCss'>" . $this->getName() . "</div>
        <div class='$cardBodyCss'><form id='" . $this->getId() . "' name='" . $this->getName() . "' method='" . $this->getMethod() . "' action='" . $this->getAction() . "' class='$formCss'>";
        $this->form .= $formStart;
        return $this;
    }

    /**
     * Ends the form.
     *
     * @return string
     */
    public function formEnd(): string
    {
        return $this->form . "</form></div></div>";
    }

    /**
     * Generate an input
     *
     * @param string $name
     * @param [type] $type
     * @param string $id
     * @param string $placeholder
     * @param string $inputCss
     * @return self
     */
    public function input(string $name, $type, $id = '', $placeholder = '', $inputCss = 'form-control mr-2 mb-2'):self
    {
        $input = "<input name='$name' type='$type' class='$inputCss' id='$id' placeholder='$placeholder'>";
        $this->form .= $input;
        return $this;
    }

    /**
     * Generate the submit button of the form
     *
     * @param string $name
     * @param string $submitCss
     * @return self
     */
    public function submitButton(string $name, $submitCss = 'btn btn-dark float-right mt-2'):self
    {
        $button = "<button name='$name' type='submit' class='$submitCss'>$name</button>";
        $this->form .= $button;
        return $this;
    }

    /**
     * Generate a label
     *
     * @param string $text
     * @param [type] $for
     * @param string $labelCss
     * @return self
     */
    public function label(string $text, $for, $labelCss = 'mr-2 mb-2'):self
    {
        $label = "<label class='$labelCss'for='$for'>$text</label>";
        $this->form .= $label;
        return $this;
    }

    /**
     * Generate a select form
     *
     * @param string $name
     * @param array $options
     * @return self
     */
    public function select(string $name, array $options, $selectCss = 'form-control mr-2 mb-2'):self
    {
        $return = "<select class='$selectCss' name= '$name' id='$name'><option value='' disabled selected>$name</option>";
        foreach ($options as $option) {
            $return .= "<option value='$option'>$option</option>";
        }
        $return .= "</select>";
        $this->form .= $return;
        return $this;
    }
    /**
     * Generate a textarea
     *
     * @param [type] $name
     * @param string $placeholder
     * @param string $rows
     * @param string $textareaCss
     * @return self
     */
    public function textarea($name, $placeholder = '', $rows = '5', $textareaCss = 'form-control mr-2 mb-2'):self
    {
        $textarea = "<textarea class='$textareaCss' name='$name' id='$name' rows='$rows' placeholder='$placeholder'></textarea>";
        $this->form .= $textarea;
        return $this;
    }
    /**
     * Generate an checkbox input
     *
     * @param [type] $checkboxName
     * @param [type] $checkboxId
     * @param [type] $label
     * @param string $checkboxInputCss
     * @param string $checkboxLabelCss
     * @return self
     */
    public function checkbox($checkboxName, $checkboxId, $label, $checkboxInputCss = 'form-check-input', $checkboxLabelCss = 'form-check-label'):self
    {
        $checkbox = "<input type='checkbox' class='$checkboxInputCss' name='$checkboxName' id='$checkboxId'>
        <label class='$checkboxLabelCss' for='$checkboxId'>$label</label>";
        $check = $this->wrap($checkbox, "div class='form-check'");
        $this->form .= $check;
        return $this;
    }
    /**
     * Generate a group radio using a key/value array
     *
     * @param [type] $name
     * @param array $idLabelRadio
     * @param string $radioInputCss
     * @param string $radioLabelCss
     * @return self
     */
    public function radio($name, array $idLabelRadio, $radioInputCss = 'form-check-input', $radioLabelCss = 'form-check-label'):self
    {
        $groupRadio = '';
        foreach ($idLabelRadio as $id => $label) {
            $radio = "<input type='radio' name='$name' class='$radioInputCss' id='$id' value='$id'>
        <label class='$radioLabelCss' for='$id'>$label</label>";
            $groupRadio .= $this->wrap($radio, "div class='form-check'");
        }
        $this->form .= $groupRadio;
        return $this;
    }

    /**
     * Generate a group checkbox using a key/value array
     *
     * @param array $idLabelCheckbox
     * @param string $groupCheckboxInputCss
     * @param string $groupCheckboxLabelCss
     * @return self
     */
    public function groupCheckbox(array $idLabelCheckbox, $groupCheckboxInputCss = 'form-check-input', $groupCheckboxLabelCss = 'form-check-label'):self
    {
        $groupCheckbox = '';
        foreach ($idLabelCheckbox as $id => $label) {
            $checkbox = "<input type='checkbox' class='$groupCheckboxInputCss' name='$label' id='$id'>
        <label class='$groupCheckboxLabelCss' for='$id'>$label</label>";
            $groupCheckbox .= $this->wrap($checkbox, "div class='form-check'");
        }
        $this->form .= $groupCheckbox;
        return $this;
    }

    /**
     * Set HTML tags around select element
     *
     * @param [type] $element
     * @param [type] $tag
     * @return string
     */
    public function wrap($element, $tag):string
    {
        return "<$tag>$element</$tag>";
    }

    /**
     * Get the value of form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set the value of form
     *
     * @return  self
     */
    public function setForm($form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the value of action
     *
     * @return  self
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }
}
