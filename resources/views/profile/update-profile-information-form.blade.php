<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and general details.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="mb-3" x-data="{photoName: null, photoPreview: null}">
                <!-- Profile Photo File Input -->
                <input type="file" hidden
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "
                       accept=".png,.jpg,.jpeg"
                />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
                </div>

                <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
				</x-jet-secondary-button>

				@if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        <div wire:loading wire:target="deleteProfilePhoto" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>

                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div class="w-md-75">
            <!-- Username -->
            <div class="mb-3">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" type="text" class="{{ $errors->has('username') ? 'is-invalid' : '' }}" wire:model.defer="state.username" autocomplete="username" />
                <x-jet-input-error for="username" />
            </div>

            <!-- Name -->
            <div class="mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            <div class="row">
                <!-- Date of Birth -->
                <div class="mb-3 col-md-4">
                    <x-jet-label for="dob" value="{{ __('Name') }}" />
                    <x-jet-input id="dob" type="date" class="{{ $errors->has('dob') ? 'is-invalid' : '' }}" wire:model.defer="state.dob" autocomplete="dob" />
                    <x-jet-input-error for="dob" />
                </div>

                <!-- Name -->
                <div class="mb-4 col-md-4">
                    <x-jet-label for="location" value="{{ __('Location') }}" />
                    <x-jet-input placeholder="Enter your City and Country" id="location" type="text" class="{{ $errors->has('location') ? 'is-invalid' : '' }}" wire:model.defer="state.location" autocomplete="location" />
                    <x-jet-input-error for="location" />
                </div>
            </div>

            <!-- About me -->
            <div class="mb-3 col-md-12">
                <x-jet-label for="description" value="{{ __('About Me') }}" />
                <textarea id="description" placeholder="Tell who you are.." rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" wire:model.defer="state.description"></textarea>
                <x-jet-input-error for="description" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
		<div class="d-flex align-items-baseline">
			<x-jet-button>
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

				{{ __('Save') }}
			</x-jet-button>
		</div>
    </x-slot>
</x-jet-form-section>
