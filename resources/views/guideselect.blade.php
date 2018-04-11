@extends('layouts.lay-admin')

@section('content')
<div>
    <h3><i> Select Guide </i> </h3>
<form action = "{{ action('AdminController@teamconfirm') }}" method ="POST">
    <select id="list" name="list">
        <option selected="selected">Choose one</option>
        <?php
        // A sample product array
        
        
        // Iterating through the product array
        foreach($faculty as $fac){
        ?>
        <option value="<?php echo strtolower($fac->name); ?>"><?php echo $fac->name; ?></option>
        
        <?php
        }
        ?>
        <input type="hidden" id="facid" name="facid" value= <?php echo $fac->id ?>>
    </select>
    <input type="hidden" id="groupid" name="groupid" value= <?php echo $groupid ?>>
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
<input type="submit" value="Submit">
</form>
<a href="/createfaculty/"><i>click here to create a faculty</i></a>
@endsection