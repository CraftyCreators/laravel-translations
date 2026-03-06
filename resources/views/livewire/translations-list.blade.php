<div class="page-translations">
    <div class="row mb-3">
        <div class="col-md-6 col-sm-12 col-lg-3">
            <div class="input-group">
                <input wire:model.live="search" type="search" placeholder="@lang('admin.searchLanguagePlaceholder')" class="form-control"
                    autofocus />
                <span class="input-group-text">
                    <i class="lni lni-search"></i>
                </span>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-9 text-end">
            <div class="d-flex justify-content-end">
                @livewire('translations-ui::export-translations')
                <button wire:click="$dispatch('openModal', {component: 'translations-ui::create-translation-modal'})"
                    type="button" class="ms-2 btn btn-primary text-white">
                    <span class="text-sm">@lang('admin.newLanguage')</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    @lang('admin.languages')
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    @lang('common.name')
                                </th>
                                <th></th>
                                <th width="250"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($translations as $translation)
                                <tr>
                                    <td width="40" class="align-middle position-relative">
                                        <a href="{{ route('translations_ui.phrases.index', $translation) }}" class="absolute inset-0"></a>
                                        <x-dynamic-component class="w-6 h-6"
                                        component="flag-language-{{ $translation->language->code }}" />
                                    </td>
                                    <td width="200" class="align-middle position-relative">
                                        <a href="{{ route('translations_ui.phrases.index', $translation) }}" class="absolute inset-0"></a>
                                        <span class="fw-semibold">
                                            {{ $translation->language->name }}
                                        </span>
                                        <span class="border px-2 py-1 rounded ms-2">
                                            {{ $translation->language->code }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        @if (!$translation->source)
                                            <div class="progress w-100" data-coreui-toggle="tooltip"
                                                title="@lang('admin.translatedPercentage', ['translated' => $this->getTranslationProgressPercentage($translation)])">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: {{ $this->getTranslationProgressPercentage($translation) }}%"
                                                    aria-valuenow="{{ $this->getTranslationProgressPercentage($translation) }}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle text-end">
                                        @if ($translation->is_default)
                                            <button type="button" class="btn btn-link btn-sm text-success fs-4">
                                                <i class="lni lni-protection"></i>
                                            </button>
                                        @else
                                            <a href="{{ route('admin.system.language.default', $translation) }}"
                                                class="btn btn-link btn-sm text-muted fs-4 z-50"
                                                data-coreui-toggle="tooltip" title="@lang('admin.makeDefaultLanguage')">
                                                <i class="lni lni-protection"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('translations_ui.phrases.index', $translation) }}"
                                            class="btn btn-link btn-sm fs-4 text-muted z-50"
                                            data-coreui-toggle="tooltip"
                                            title="{{ !$translation->source ? __('admin.translate') : __('common.edit') }}">
                                            @if (!$translation->source)
                                                <i class="lni lni-pencil"></i>
                                            @else
                                                <i class="lni lni-cog"></i>
                                            @endif
                                        </a>
                                        @if (!$translation->source && !$translation->is_default)
                                            <a href="{{ route('admin.system.language.status', ['language' => $translation, 'status' => $translation->status ? 'disable' : 'enable']) }}"
                                                class="btn btn-link btn-sm text-{{ $translation->status ? 'muted' : 'success' }} fs-4 relative z-50"
                                                data-coreui-toggle="tooltip"
                                                title="{{ $translation->status ? __('admin.disableTranslation') : __('admin.enableTranslation') }}">
                                                @if (!$translation->status)
                                                    <i class="lni lni-checkmark-circle"></i>
                                                @else
                                                    <i class="lni lni-cross-circle"></i>
                                                @endif
                                            </a>
                                            <button wire:click="confirmDelete({{ $translation->id }})"
                                                class="btn btn-link btn-sm text-danger fs-4 z-50"
                                                data-coreui-toggle="tooltip" title="@lang('admin.deleteTranslation')">
                                                <i class="lni lni-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        @lang('common.noRecordsMatchingCriteria')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($translations->hasPages())
                    <div class="card-footer">
                        {{ $translations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
