<?php

namespace formBuilder;

class Form
{
    protected $form;
    protected $name;
    protected $method;
    protected $action;

    /**
     * To use the class, the name and the method of the form must be set. The action is optionnal.
     *
     * @param [type] $name
     * @param [type] $method
     * @param string $action
     */
    public function __construct($name, $method, $action = '')
    {
        $this->setName($name);
        $this->setMethod($method);
        $this->setAction($action);
    }

    /**
     * Starts the form
     *
     * @param string $cardCss
     * @param string $cardHeaderCss
     * @param string $formCss
     * @return void
     */
    public function formStart($cardCss = 'card mx-2 my-2', $cardHeaderCss = 'bg-dark text-white', $formCss = 'mx-2 my-2')
    {
        $formStart =  "<div class='$cardCss'><div class='card-header $cardHeaderCss'>" . $this->getName() . "</div>
        <div class='card-body'><form name='" . $this->getName() . "' method='" . $this->getMethod() . "' action='" . $this->getAction() . "' class='$formCss'>";
        $this->form .= $formStart;
        return $this;
    }

    /**
     * Ends the form
     *
     * @return void
     */
    public function formEnd()
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
     * @return void
     */
    public function input(string $name, $type, $id = '', $placeholder = '', $inputCss = 'form-control mr-2 mb-2')
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
     * @return void
     */
    public function submitButton(string $name, $submitCss = 'btn btn-dark float-right mt-2')
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
     * @return void
     */
    public function label(string $text, $for, $labelCss = 'mr-2 mb-2')
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
     * @return void
     */
    public function select(string $name, array $options, $selectCss = 'mr-2 mb-2')
    {
        $return = "<select class='form-control $selectCss' name= '$name' id='$name'><option value='' disabled selected>$name</option>";
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
     * @return void
     */
    public function textarea($name, $placeholder = '', $rows = '5', $textareaCss = 'mr-2 mb-2')
    {
        $textarea = "<textarea class='form-control $textareaCss' name='$name' id='$name' rows='$rows' placeholder='$placeholder'></textarea>";
        $this->form .= $textarea;
        return $this;
    }
  /**
   * Generate a checkbox
   *
   * @param [type] $checkboxName
   * @param [type] $checkboxId
   * @param [type] $label
   * @return void
   */
    public function checkbox($checkboxName, $checkboxId, $label)
    {
        $checkbox = "<input type='checkbox' class='form-check-input' name='$checkboxName' id='$checkboxId'>
        <label class='form-check-label' for='$checkboxId'>$label</label>";
        $check = $this->wrap($checkbox, "div class='form-check'");
        $this->form .= $check;
        return $this;
    }
    /**
     * Generate a group radio using a key/value array
     *
     * @param [type] $name
     * @param array $idLabelRadio
     * @return void
     */
    public function radio($name, array $idLabelRadio)
    {
        $groupRadio = '';
        foreach ($idLabelRadio as $id => $label) {
            $radio = "<input type='radio' name='$name' class='form-check-input' id='$id' value='$id'>
        <label class='form-check-label' for='$id'>$label</label>";
            $groupRadio .= $this->wrap($radio, "div class='form-check'");
        }
        $this->form .= $groupRadio;
        return $this;
    }

    /**
     * Generate a group checkbox using a key/value array
     *
     * @param array $idLabelCheckbox
     * @return void
     */
    public function groupCheckbox(array $idLabelCheckbox)
    {
        $groupCheckbox = '';
        foreach ($idLabelCheckbox as $id => $label) {
            $checkbox = "<input type='checkbox' class='form-check-input' name='$label' id='$id'>
        <label class='form-check-label' for='$id'>$label</label>";
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
     * @return void
     */
    public function wrap($element, $tag)
    {
        return "<$tag>$element</$tag>";
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
}
