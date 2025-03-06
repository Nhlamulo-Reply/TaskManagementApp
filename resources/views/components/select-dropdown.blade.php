<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-900">{{ $label }}</label>
    @endif
    <div class="relative mt-2">
        <select name="{{ $name }}" {{ $attributes->merge(['class' => '...']) }}>
            <option value="">{{ $placeholder }}</option>
            @foreach($options as $key => $label)
                <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>

    </div>
</div>
