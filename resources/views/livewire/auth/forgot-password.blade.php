 <div class="flex flex-col gap-6">
    <x-auth-header :title="__('Olvidaste la Contraseña')" :description="__('Ingresá tu correo electrónico para recibir el link de recuperación de contraseña')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Correo electrónico')"
            type="email"
            required
            autofocus
            placeholder="email@ejemplo.com"
        />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Email para recibir link de recuperación de contraseña') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        <span>{{ __('O, regresa para') }}</span>
        <flux:link :href="route('login')" wire:navigate>{{ __('Iniciar Sesión') }}</flux:link>
    </div>
</div>
