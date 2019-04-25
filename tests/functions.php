<?php

require_once  '../functions.php';

use PHPUnit\Framework\Testcase;

class FunctionTest extends Testcase
{
    public function testAddParagraphsSuccess()
    {
        $expected = '<p>Hello World</p>';
        $input = [['paragraph' => 'Hello World']];
        $case = addParagraphs($input);
        $this->assertEquals($expected, $case);
    }

    public function testAddParagraphsFailure()
    {
        $expected = '<p></p>';
        $input = [['paragraph' => '']];
        $case = addParagraphs($input);
        $this->assertEquals($expected, $case);
    }

    public function testAddParagraphsFailure2()
    {
        $expected = '';
        $input = [['paragraph' => []]];
        $case = addParagraphs($input);
        $this->assertEquals($expected, $case);
    }

    public function testAddParagraphsFailure3()
    {
        $expected = '';
        $input = [['awesome' => []]];
        $case = addParagraphs($input);
        $this->assertEquals($expected, $case);
    }


    public function testAddParagraphsMalformed()
    {
        $input = 3;
        $this->expectException(TypeError::class);
        addParagraphs($input);
    }


    public function testEditParagraphDropdownSuccess()
    {
        $expected = '<option value=>paragraph 1 Hello World</option>';
        $input = [['paragraph' => 'Hello World']];
        $case = editParagraphDropdown($input);
        $this->assertEquals($expected, $case);
    }

    public function testEditParagraphDropdownFailure()
    {
        $expected = '';
        $input = [['paragraph' => []]];
        $case = editParagraphDropdown($input);
        $this->assertEquals($expected, $case);
    }

    public function testEditParagraphDropdownFailure2()
    {
        $expected = '';
        $input = [['awesome' => []]];
        $case = editParagraphDropdown($input);
        $this->assertEquals($expected, $case);
    }

    public function testEditParagraphDropdownMalformed()
    {
        $input = 3;
        $this->expectException(TypeError::class);
        editParagraphDropdown($input);
    }

    public function testPasteEditSuccess()
    {
        $expected = 'Hello World';
        $input = ['paragraph' => 'Hello World'];
        $case = pasteEdit($input);
        $this->assertEquals($expected, $case);
    }

    public function testPasteEditFailure()
    {
        $expected = '';
        $input = [['paragraph' => []]];
        $case = pasteEdit($input);
        $this->assertEquals($expected, $case);
    }

    public function testPasteEditFailure2()
    {
        $expected = '';
        $input = [['awesome' => []]];
        $case = pasteEdit($input);
        $this->assertEquals($expected, $case);
    }

    public function testPasteEditFailureMalformed()
    {
        $input = 3;
        $this->expectException(TypeError::class);
        pasteEdit($input);
    }

    public function testSubmitButtonSuccess()
    {
        $expected = '<input type="submit" name="submit" value="Submit">';
        $case = submitButton();
        $this->assertEquals($expected, $case);
    }
}
