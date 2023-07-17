@props(['disabled' => false, 'options' => [], 'selected' => null, 'default' => null])
 
<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-gray-300 border-dark border-gray-700 text-dark focus-border-indigo-500 focus-border-indigo-600 focus-ring-indigo-500 focus-ring-indigo-600 rounded-md shadow-sm']) !!}>
    <option value="">Select</option>
    @foreach($options as $key => $value)
        <option value="{{ $key }}" @selected($selected === $key || $default === $value)>{{ $value }}</option>
    @endforeach
</select>