<div class="row">
    <div class="col-md-6">
        <div class="d-flex">
            <x-dynamic-component class="h-7" component="flag-language-{{ $translation->language->code }}" />
            <div class="d-flex align-items-center justify-content-center ms-2">
                <div class="text-lg font-semibold text-gray-800">{{ $translation->language->name }}</div>
                <div class="text-sm text-gray-500 border rounded-md px-1.5 py-0.5 ms-2">
                    {{ $translation->language->code }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row gx-2 justify-content-end">
            <div class="col-6">
                <input class="form-control" wire:model.live="search" icon="search" type="search"
                    placeholder="Search translations by key or value" />
            </div>
            <div class="col-auto">
                <select class="form-select" placeholder="Status" wire:model.live="status">
                    @foreach ($statuses as $status)
                        <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button wire:click="$dispatch('openModal', {component: 'translations-ui::create-source-key-modal'})"
                    type="button" class="btn btn-primary text-white">
                    @lang('translation.newSourceKey')
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="150">@lang('common.key')</th>
                            <th>@lang('common.name')</th>
                            <th>@lang('admin.translation')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($phrases as $phrase)
                            <tr class="position-relative">
                                <td class="align-middle">
                                    <span class="border rounded-md px-2 py-1 text-truncate">
                                        {{ $phrase->key }}
                                    </span>
                                </td>
                                <td class="align-middle">{{ $phrase->group }}</td>
                                <td class="align-middle"> {{ $phrase->value }}</td>
                                <td class="align-middle text-end">
                                    <a href="{{ route('translations_ui.phrases.show', ['translation' => $phrase->translation, 'phrase' => $phrase]) }}"
                                        class="btn btn-link text-muted fs-4">
                                        <x-translations::icons.translate class="w-5 h-5" />
                                    </a>
                                    <a href="{{ route('translations_ui.phrases.show', ['translation' => $phrase->translation, 'phrase' => $phrase]) }}"
                                        class="absolute inset-0 z-10"></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">@lang('common.noRecordsMatchingCriteria')</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($phrases->hasPages())
                <div class="card-footer">
                    {{ $phrases->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
