<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">
            @if (Auth::user()->external_auth == 'google' || Auth::user()->external_auth == 'facebook')
                <div class="mb-3 h5">
                    {{ __('隆隆隆 Gracias por registrarte !!! 馃榾 Antes de comenzar, tenemos que verificar tu correo,馃ぉ haciendo clic en el enlace que te acabamos de enviar. Si no recibiste el correo electr贸nico, con gusto te enviaremos otro 馃槑.') }}
                </div>
            @else
                <div class="mb-3 h5">
                    {{ __('隆隆隆 Gracias por registrarte !!! 馃榾 Antes de comenzar, verifica tu direcci贸n de correo electr贸nico 馃ぉ haciendo clic en el enlace que te acabamos de enviar. Si no recibiste el correo electr贸nico, con gusto te enviaremos otro 馃槑.') }}
                </div>
            @endif

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('Se te ha enviado un nuevo enlace de verificaci贸n a la direcci贸n de correo electr贸nico 馃槃.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between ">

                <form method="POST" action="/logout" class="mx-auto text-center">
                    @csrf

                    <button type="submit" class="btn bg-danger text-white mx-2 ">
                        {{ __('Cancelar') }}
                    </button>
                </form>

                {{-- <form method="POST" action="{{ route('dashboard.index') }}" class="mx-auto  text-center">
                    @csrf

                    <button type="submit" class="btn bg-warning text-white mx-2 ">
                        {{ __('M谩s tarde') }}
                    </button>
                </form> --}}

                {{-- <a class="btn btn-warning text-white mx-2 text-center" href="{{ route('dashboard.index') }}">M谩s tarde</a> --}}


                <form method="POST" action="{{ route('verification.send') }}" class="mx-auto text-center">
                    @csrf

                    <div>

                        <button type="submit" class="btn bg-success text-white mx-2">
                            {{ __('Reenviar correo electr贸nico') }}
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
