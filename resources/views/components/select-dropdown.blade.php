<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-900">{{ $label }}</label>
    @endif
    <div class="relative mt-2">
        <select name="{{ $name }}" id="{{ $name }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">{{ $placeholder }}</option>
            @foreach($options as $key => $value)
                <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
    </div>
</div>
