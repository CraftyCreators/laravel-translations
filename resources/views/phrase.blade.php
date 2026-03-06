<x-translations::layouts.app>
    <div class="grid gap-8 grid-cols-1 lg:grid-cols-2">
        @if (!$translation->source)
            <x-translations::source-phrase :phrase="$phrase->source" />
        @else
            <div class="col-span-1 bg-white rounded-md overflow-hidden border order-last px-4 divide-y py-4">
                <div class="w-full flex py-2">
                    <div class="mt-1 flex-shrink-0">
                        <i class="lni lni-information text-gray-400"></i>
                    </div>
                    <div class="ml-3 flex-1 flex-col space-y-1">
                        <span class="text-sm font-medium text-gray-900">@lang('translation.currentVersion')</span>
                        <p class="text-sm text-gray-500">{{ $phrase->value }}</p>
                    </div>
                </div>

                <div class="w-full flex py-2">
                    <div class="mt-1 flex-shrink-0">
                        <i class="lni lni-key text-gray-400"></i>
                    </div>
                    <div class="ml-3 flex-1 flex items-center gap-4 space-y-1">
                        <span class="text-sm font-medium text-gray-900">@lang('common.key'):</span>
                        <p class="text-sm text-gray-500 truncate border px-2 py-1 rounded-md max-w-max">
                            {{ $phrase->key }}</p>
                    </div>
                </div>

                <div class="w-full flex py-2">
                    <div class="mt-1 flex-shrink-0">
                        <i class="lni lni-empty-file text-gray-400"></i>
                    </div>
                    <div class="ml-3 flex-1 flex items-center gap-4 space-y-1">
                        <span class="text-sm font-medium text-gray-900">@lang('common.fileName'):</span>
                        <p class="text-sm text-gray-500 truncate border px-2 py-1 rounded-md max-w-max">
                            {{ $phrase->file->file_name }}</p>
                    </div>
                </div>

                <div class="w-full flex py-2">
                    <div class="mt-1 flex-shrink-0">
                        <i class="lni lni-code text-gray-400"></i>
                    </div>
                    <div class="ml-3 flex-1 flex-col space-y-2">
                        <span class="text-sm font-medium text-gray-900">@lang('translation.parameters')</span>
                        <div class="w-full flex gap-2">
                            @if (!blank($phrase->parameters))
                                @foreach ($phrase->parameters as $parameter)
                                    <span
                                        class="inline-flex items-center rounded-md bg-violet-100 px-3 py-1.5 text-sm font-medium text-violet-800">{{ $parameter }}</span>
                                @endforeach
                            @else
                                <p class="text-sm text-gray-500">@lang('translation.noParameters')</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @livewire('translations-ui::phrase-form', ['translation' => $translation, 'phrase' => $phrase])
    </div>
</x-translations::layouts.app>
