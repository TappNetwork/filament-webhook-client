<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
<pre class="text-sm leading-6 text-gray-950 dark:text-white">
{{ json_encode(
    $getState(),
    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
) }}
</pre>
</x-dynamic-component>
