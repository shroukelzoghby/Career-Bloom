<x-layout>
    <x-page-heading>Login</x-page-heading>
    <x-forms.form method="POST" action="/login">
        <x-forms.input label="Your Email" name="email" type="email"/>
        <x-forms.input label="Your Password" name="password" type="password"/>
        <x-forms.button >Login</x-forms.button>


    </x-forms.form>
</x-layout>
