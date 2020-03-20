
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::label('body', 'Содержание') }}
{{ Form::textarea('body') }}<br>
{{ Form::select('state', ['draft' => 'Черновик', 'published' => 'Опубликован']) }}<br>
