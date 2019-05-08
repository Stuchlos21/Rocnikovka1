@extends('layouts.app')
@extends('layouts.sidebar')
<?php
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "db_rocnikova");
?>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Přidat nového uživatele!</div>      
                    <div class="panel-body">
                            {!! Form::open(['action' => 'UserController@store', 'method' => 'POST']) !!}
                                <div>
                                    {{Form::label('name', 'Jméno',['class' => 'form-label'])}}
                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'John', 'required'])}}
                                </div>

                                <div>
                                    {{Form::label('surname', 'Příjmení',['class' => 'form-label'])}}
                                    {{Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Blaze', 'required'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('email', 'E-mail',['class' => 'form-label'])}}
                                    {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'John@gmail.com', 'required'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('nickname', 'Přezdívka')}}
                                    {{Form::text('nickname', '', ['class' => 'form-control', 'placeholder' => 'Johny', 'required'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('phone', 'Tel. číslo')}}
                                    {{Form::number('phone', '', ['class' => 'form-control', 'placeholder' => '987456123', 'required'])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('adress', 'Adresa')}}
                                    {{Form::text('adress', '', ['class' => 'form-control', 'placeholder' => 'California 9', 'required'])}}
                                </div>

                                <div class="help1" title="1 - admin, 2 - učitel, 3 - žák">?</div>

                                <div>
                                    <label class="form-label">Status</label>
                                    <div>
                                            <select name="status" class="form-control">
                                                <?php
                                                    $res = mysqli_query($link, "select * from statuses");
                                                    while($row = mysqli_fetch_array($res))
                                                    {
                                                ?>
                                                <option> <?php echo $row["id_status"]; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                    </div>
                                </div>
                                <br>

                                <div>
                                    <label class="form-label">Třída</label>
                                    <div class="form-control">
                                            <select name="trida">
                                                <?php
                                                    $res = mysqli_query($link, "select * from tridas");
                                                    while($row = mysqli_fetch_array($res))
                                                    {
                                                ?>
                                                <option> <?php echo $row["id_tridy"]; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    {{Form::label('kabinet', 'Kabinet')}}
                                    {{Form::number('kabinet', '', ['class' => 'form-control', 'placeholder' => '238', 'min' => 0])}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('barva', 'Barva uživatele (pouze pro učitele)')}}
                                    {{Form::color('barva', '', ['class' => 'form-control'])}}
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" >Heslo</label>
                                    <input id="password" type="password" placeholder="Heslo" class= "form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <br>
                                {{Form::submit('Odeslat', ['class' => 'btn btn-primary'])}}       
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection