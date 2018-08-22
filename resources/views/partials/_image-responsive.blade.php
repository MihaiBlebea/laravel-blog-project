<!-- height | default: 350  -->
<!-- image_path | default: 'images/post-placeholder.png' -->

<div class="position-relative" style="height: {{ $height ?? 350 }}px;">
    <div class="w-100 h-100 bg-img" style="background-image: url('{{ asset($image_path ?? 'images/post-placeholder.png') }}');"></div>
</div>
