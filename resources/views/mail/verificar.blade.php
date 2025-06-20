<x-mail::message>
# Email de verificação

<h2>Bem vindo, {{ $usuario }}</h2>

<p>Clique no botão abaixo para verificar seu endereço de e-mail:</p>

<x-mail::button :url="$urlVerificacao" color="success">
Verificar Email
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>