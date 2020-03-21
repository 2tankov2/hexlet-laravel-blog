
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::label('body', 'Содержание') }}
{{ Form::textarea('body') }}<br>
{{ Form::select('state', ['draft' => 'Черновик', 'published' => 'Опубликован']) }}<br>
{{ Form::select('category_id', ['1' => 'работа', '2' => 'обучение', '3' => 'прочее']) }}<br>
