<div class="p-6">
    <div class="w-full flex items-center justify-between mb-4">
        <h3 class="text-base font-semibold leading-6 text-gray-700">
            @lang('translation.newSourceKey')
        </h3>
        <i class="lni lni-plus"></i>
    </div>
    <div class="form-group mb-3">
        <input class="form-control" wire:model="key" placeholder="Enter the key" />
        <div class="small text-muted">
            @lang('translation.useDotNotationNestedKey')
        </div>
    </div>
    <div class="form-group mb-3">
        <textarea placeholder="@lang('translation.addKeyPlaceholder')" wire:model="key_translation" class="form-control"></textarea>
    </div>
    <div class="form-group mb-4">
        <select class="form-select" wire:model="file">
            <option value="">@lang('translation.selectFile')</option>
            @foreach ($files as $file)
                <option value="{{ $file['id'] }}">{{ $file['file_name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="d-flex">
        <button wire:click="$dispatch('closeModal')" type="button" class="btn btn-light">
            @lang('common.cancel')
        </button>
        <div class="d-grid ms-2 w-full">
            <button type="button" wire:click="create" wire:loading.attr="disabled" class="btn btn-primary text-white">
                <svg wire:loading wire:target="create" class="animate-spin -ml-1 mr-3 h-6 w-6 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span wire:target="create" wire:loading.remove>@lang('translation.addKey')</span>
            </button>
        </div>
    </div>
</div>
