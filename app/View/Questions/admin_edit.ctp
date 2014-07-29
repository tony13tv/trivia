<?=$this->form->create('Question', ['type' => 'file'])?>
<?=$this->form->input('id')?>
<?=$this->form->input('content')?>
<?=$this->form->input('image', ['type' => 'file'])?>
<?=$this->form->input('category_id')?>
<?=$this->form->button('Save')?>
<?=$this->form->end()?>