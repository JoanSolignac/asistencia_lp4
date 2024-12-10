<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                        <!--Logo SuperMarketEmanuelito-->
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="300.000000pt" height="60.000000pt" viewBox="0 0 300.000000 60.000000" preserveAspectRatio="xMidYMid meet">
                                <metadata>
                                Created by potrace 1.10, written by Peter Selinger 2001-2011
                                </metadata>
                                <g transform="translate(0.000000,60.000000) scale(0.100000,-0.100000)"
                                fill="#ffffff" stroke="none">
                                <path d="M2241 430 l-1 -160 34 0 c29 0 33 3 29 23 -3 13 3 33 14 46 l19 24
                                38 -46 c30 -37 44 -46 76 -49 22 -2 40 -2 40 -1 0 2 -23 33 -51 69 l-52 65 49
                                50 48 49 -36 0 c-29 0 -46 -9 -85 -45 -26 -25 -51 -45 -55 -45 -5 0 -8 41 -8
                                90 l0 90 -29 0 -30 0 0 -160z m44 63 c2 -37 4 -74 4 -80 1 -19 32 -16 70 8 18
                                11 36 18 39 15 3 -4 1 -6 -5 -6 -24 0 -23 -34 2 -66 14 -18 25 -37 25 -43 0
                                -20 -17 -12 -40 19 -33 44 -64 40 -86 -10 -26 -58 -33 -34 -29 99 4 148 4 145
                                11 138 4 -3 8 -37 9 -74z"/>
                                <path d="M2396 337 c3 -10 9 -15 12 -12 3 3 0 11 -7 18 -10 9 -11 8 -5 -6z"/>
                                <path d="M151 565 c-44 -20 -60 -42 -61 -84 0 -48 22 -68 101 -91 68 -21 89
                                -40 64 -60 -18 -15 -82 -15 -120 0 -25 9 -31 9 -42 -6 -20 -27 -17 -31 32 -49
                                68 -27 141 -17 177 24 55 62 25 117 -82 147 -65 18 -81 34 -59 60 10 12 25 15
                                59 11 25 -2 52 -8 61 -11 11 -5 19 1 27 19 9 20 9 26 -1 29 -6 2 -21 7 -32 11
                                -41 15 -91 14 -124 0z m129 -26 c11 -7 2 -8 -32 -3 -52 7 -111 -3 -102 -17 3
                                -5 0 -9 -5 -9 -34 0 8 -77 45 -83 10 -1 25 -6 32 -11 7 -4 16 -6 19 -3 11 12
                                61 -15 65 -36 6 -31 -5 -70 -21 -75 -10 -3 -12 2 -8 19 12 45 -1 66 -51 79
                                -26 7 -56 18 -67 24 -11 6 -24 10 -30 11 -5 0 -10 19 -11 43 -1 36 3 45 25 57
                                30 17 119 19 141 4z m-83 -242 c7 0 10 -3 8 -7 -5 -8 -82 4 -92 14 -4 4 11 4
                                33 0 21 -4 44 -7 51 -7z m63 3 c0 -5 -10 -10 -22 -9 -22 0 -22 1 -3 9 11 5 21
                                9 23 9 1 1 2 -3 2 -9z"/>
                                <path d="M1400 421 l0 -149 30 -4 29 -4 3 94 3 94 43 -76 c28 -49 50 -76 61
                                -76 11 0 33 27 61 75 23 42 45 73 48 70 3 -3 5 -43 3 -89 l-2 -84 31 -4 30 -5
                                0 154 0 153 -27 0 c-24 -1 -34 -12 -73 -77 -25 -43 -48 -85 -52 -95 -4 -10
                                -11 -18 -15 -18 -4 0 -33 43 -63 95 -48 83 -58 95 -82 95 l-28 0 0 -149z m44
                                114 c-10 31 22 -15 66 -94 33 -61 38 -66 68 -65 18 1 32 -2 32 -8 0 -5 -4 -6
                                -10 -3 -5 3 -10 -1 -10 -9 0 -9 -5 -16 -11 -16 -5 0 -7 -5 -3 -11 4 -7 2 -10
                                -6 -7 -7 2 -24 25 -39 51 -49 87 -81 108 -81 51 0 -13 -4 -24 -10 -24 -5 0
                                -10 -26 -11 -57 -1 -44 -3 -52 -8 -32 -5 14 -8 45 -7 70 1 24 3 73 4 108 2 60
                                3 63 17 45 15 -19 15 -19 9 1z m274 -127 c-1 -65 -5 -118 -10 -118 -8 0 -13
                                34 -8 55 6 28 0 88 -11 101 -17 21 -26 18 -54 -23 -26 -39 -34 -39 -13 0 6 12
                                27 46 46 75 25 40 36 51 43 41 4 -8 7 -67 7 -131z"/>
                                <path d="M2790 521 c0 -21 -5 -28 -17 -27 -13 1 -18 -6 -18 -24 0 -18 5 -25
                                20 -25 18 0 20 -7 21 -69 0 -62 3 -71 28 -93 27 -23 70 -30 95 -14 18 12 4 52
                                -17 50 -40 -4 -42 0 -42 64 l0 64 30 -5 c28 -4 30 -2 30 28 0 30 -2 32 -30 28
                                -27 -4 -30 -2 -30 24 0 25 -3 28 -35 28 -32 0 -35 -3 -35 -29z m47 -3 c-2 -7
                                2 -21 10 -30 13 -14 13 -20 1 -36 -8 -12 -13 -42 -12 -73 2 -42 7 -57 24 -71
                                l22 -18 -25 0 c-34 0 -38 8 -41 83 -4 71 -13 100 -30 90 -6 -3 -3 3 7 14 9 11
                                17 27 17 36 0 9 7 17 16 17 9 0 14 -6 11 -12z"/>
                                <path d="M1335 503 c-10 -3 -30 -13 -44 -22 -23 -15 -25 -15 -18 2 5 14 1 17
                                -26 17 l-32 0 3 -115 3 -115 30 0 29 0 0 68 c0 75 16 102 58 102 18 0 22 6 22
                                35 0 19 -1 34 -2 34 -2 -1 -12 -4 -23 -6z m-64 -43 c11 0 30 5 42 12 20 10 21
                                10 8 -5 -7 -10 -20 -17 -27 -17 -23 0 -35 -42 -43 -148 -1 -7 -4 -11 -9 -9 -4
                                3 -6 43 -5 89 2 97 3 107 10 91 2 -7 14 -13 24 -13z"/>
                                <path d="M370 407 c0 -85 2 -96 23 -115 33 -31 81 -38 113 -17 16 10 29 13 33
                                8 3 -6 18 -12 34 -15 l27 -5 0 118 0 119 -36 0 -35 0 2 -75 c2 -83 -8 -105
                                -50 -105 -43 0 -51 17 -51 102 l0 78 -30 0 -30 0 0 -93z m206 -22 c1 -97 -7
                                -115 -36 -80 -10 12 -10 18 0 30 7 9 14 39 15 68 4 76 4 77 13 77 4 0 8 -43 8
                                -95z m-166 24 c0 -60 11 -83 48 -103 l27 -15 -32 -1 c-50 0 -63 21 -63 101 0
                                39 4 69 10 69 6 0 10 -23 10 -51z m105 -109 c-3 -5 -12 -10 -18 -10 -7 0 -6 4
                                3 10 19 12 23 12 15 0z"/>
                                <path d="M656 387 c2 -221 0 -207 34 -207 30 0 30 1 30 54 l0 55 28 -15 c35
                                -18 56 -18 98 2 46 22 68 65 61 121 -8 78 -79 122 -151 94 -20 -7 -32 -8 -34
                                -1 -2 5 -18 10 -35 10 l-32 0 1 -113z m81 77 c14 6 13 3 -4 -13 -12 -11 -24
                                -30 -28 -41 -10 -32 13 -88 43 -105 l27 -14 -31 5 c-27 5 -32 2 -37 -18 -4
                                -12 -7 -36 -7 -53 -1 -25 -2 -27 -11 -12 -6 9 -9 25 -8 35 1 9 -1 29 -5 43 -4
                                14 -3 49 2 77 6 32 6 54 0 60 -6 6 -6 18 2 32 9 17 14 19 26 10 7 -7 22 -9 31
                                -6z m93 6 c0 -5 6 -7 14 -4 15 6 30 -22 20 -37 -3 -5 0 -8 8 -7 20 5 22 -66 2
                                -96 -9 -14 -20 -24 -24 -21 -5 3 -11 1 -15 -5 -3 -5 -16 -10 -28 -10 -18 1
                                -16 3 11 15 17 8 32 19 32 25 0 6 5 8 11 4 8 -5 10 4 7 30 -2 21 0 36 7 36 5
                                0 2 5 -7 11 -10 5 -18 16 -18 23 0 14 -33 33 -70 39 -17 3 -13 5 13 6 20 0 37
                                -3 37 -9z m-7 -38 c21 -19 23 -85 2 -102 -39 -32 -105 0 -105 52 0 55 61 85
                                103 50z"/>
                                <path d="M992 487 c-55 -31 -76 -111 -42 -165 36 -58 133 -79 188 -40 17 11
                                18 16 7 31 -10 14 -20 16 -58 8 -35 -6 -51 -5 -67 6 -41 29 -24 38 64 35 48
                                -2 86 1 90 6 12 19 -7 74 -36 103 -24 24 -38 29 -76 29 -26 -1 -57 -6 -70 -13z
                                m133 -32 c28 -27 33 -60 9 -69 -10 -4 -13 -2 -7 7 11 18 4 49 -15 64 -20 15
                                -88 17 -97 3 -3 -5 -14 -10 -23 -10 -35 0 33 28 71 29 28 1 44 -6 62 -24z
                                m-20 -25 c10 -11 16 -23 13 -26 -3 -3 -33 -4 -67 -2 l-61 3 15 23 c21 29 75
                                30 100 2z m-123 -15 c-3 -16 0 -25 8 -25 10 0 10 -3 0 -15 -16 -20 -4 -52 28
                                -70 31 -16 25 -19 -11 -6 -37 14 -78 111 -47 111 6 0 10 7 10 15 0 8 4 15 9
                                15 4 0 6 -11 3 -25z"/>
                                <path d="M1820 487 c-21 -10 -24 -15 -15 -35 7 -15 15 -20 25 -15 8 4 32 7 54
                                7 29 1 42 -4 53 -21 15 -23 15 -23 -44 -23 -74 0 -103 -18 -103 -64 0 -40 25
                                -65 74 -73 31 -5 39 -1 66 27 31 34 38 68 18 88 -9 9 -9 12 1 12 9 0 12 9 9
                                25 -3 15 -1 25 6 25 25 0 -47 29 -81 33 l-38 4 40 1 c43 2 90 -17 90 -35 0 -6
                                3 -15 8 -19 4 -4 7 -36 7 -71 0 -58 -2 -64 -19 -58 -12 3 -21 0 -25 -10 -4
                                -12 2 -15 29 -15 l35 0 0 70 c0 85 -19 136 -55 150 -34 13 -104 11 -135 -3z
                                m22 -119 c-18 -18 -15 -55 6 -67 19 -11 3 -15 -22 -5 -22 8 -21 60 2 73 23 14
                                29 14 14 -1z m98 -25 c0 -37 -81 -47 -88 -10 -4 19 28 35 65 33 17 -1 23 -7
                                23 -23z"/>
                                <path d="M2060 385 l0 -115 35 0 35 0 0 73 c0 79 9 97 50 97 21 0 25 5 25 30
                                0 35 -21 40 -60 14 -23 -15 -25 -15 -25 0 0 11 -9 16 -30 16 l-30 0 0 -115z
                                m81 78 c18 5 18 3 -5 -20 -22 -22 -26 -35 -26 -84 0 -84 -17 -81 -22 4 -5 93
                                0 121 18 106 8 -6 23 -9 35 -6z"/>
                                <path d="M2538 460 c-45 -49 -50 -89 -15 -141 39 -58 136 -76 191 -34 17 13
                                17 15 2 30 -11 11 -23 14 -38 9 -46 -15 -108 2 -108 30 0 7 29 11 87 11 l88 0
                                -2 30 c-5 67 -49 105 -124 105 -36 0 -48 -6 -81 -40z m110 13 c-10 -2 -28 -2
                                -40 0 -13 2 -5 4 17 4 22 1 32 -1 23 -4z m-80 -20 c-25 -29 -28 -51 -10 -58 9
                                -3 12 -9 7 -13 -6 -4 -11 -20 -12 -36 -1 -16 0 -26 4 -23 3 3 12 0 20 -8 8 -8
                                25 -15 38 -15 13 0 27 -5 30 -10 7 -12 -30 -6 -77 12 -29 11 -35 23 -42 76 -3
                                25 3 41 21 63 14 16 27 29 30 29 4 0 -1 -8 -9 -17z m127 7 c3 -5 2 -10 -4 -10
                                -5 0 -13 5 -16 10 -3 6 -2 10 4 10 5 0 13 -4 16 -10z m-20 -30 c10 -11 16 -23
                                13 -26 -3 -3 -33 -4 -67 -2 l-61 3 15 23 c21 29 75 30 100 2z m42 -15 c9 -21
                                9 -25 -5 -25 -8 0 -12 3 -9 6 3 4 2 15 -4 25 -5 11 -6 19 -2 19 4 0 13 -11 20
                                -25z m-30 -121 c-3 -3 -12 -4 -19 -1 -8 3 -5 6 6 6 11 1 17 -2 13 -5z"/>
                                <path d="M810 85 l0 -65 45 0 c33 0 45 4 45 15 0 11 -9 14 -32 13 -25 -2 -33
                                1 -36 16 -3 16 0 18 27 13 23 -5 31 -3 31 8 0 10 -10 15 -30 15 -20 0 -30 5
                                -30 15 0 10 11 15 35 15 19 0 35 5 35 10 0 6 -20 10 -45 10 l-45 0 0 -65z"/>
                                <path d="M942 85 c-2 -53 0 -65 13 -65 11 0 15 11 15 38 1 39 5 37 36 -15 10
                                -16 13 -14 32 22 l21 40 1 -42 c0 -31 4 -43 15 -43 12 0 14 13 12 65 -1 38 -6
                                65 -13 65 -6 0 -20 -18 -33 -40 -12 -22 -24 -40 -26 -40 -2 0 -14 18 -26 40
                                -13 22 -27 40 -33 40 -7 0 -12 -27 -14 -65z"/>
                                <path d="M1151 97 c-12 -28 -25 -58 -28 -64 -3 -7 2 -13 11 -13 9 0 16 7 16
                                15 0 21 66 20 78 -1 5 -9 14 -15 19 -13 14 5 -43 129 -59 129 -7 0 -24 -24
                                -37 -53z m59 -19 c0 -5 -9 -8 -20 -8 -21 0 -24 8 -14 34 6 15 8 15 20 -1 7
                                -10 14 -21 14 -25z"/>
                                <path d="M1290 85 c0 -53 3 -65 16 -65 14 0 16 8 11 43 l-5 42 38 -42 c21 -24
                                42 -43 46 -43 5 0 9 29 9 65 0 45 -4 65 -12 65 -8 0 -13 -14 -13 -35 0 -44 -8
                                -44 -40 0 -38 53 -50 45 -50 -30z"/>
                                <path d="M1452 98 c3 -45 7 -55 30 -67 21 -12 31 -13 52 -3 23 10 26 17 26 67
                                0 30 -4 55 -10 55 -5 0 -10 -22 -10 -49 0 -34 -4 -51 -15 -55 -32 -12 -45 5
                                -45 55 0 38 -4 49 -16 49 -12 0 -14 -10 -12 -52z"/>
                                <path d="M1610 85 l0 -65 50 0 c39 0 50 3 50 16 0 13 -7 15 -35 10 -31 -6 -35
                                -5 -35 15 0 19 4 21 30 16 22 -5 30 -3 30 8 0 10 -10 15 -30 15 -20 0 -30 5
                                -30 15 0 10 11 15 35 15 19 0 35 5 35 10 0 6 -22 10 -50 10 l-50 0 0 -65z"/>
                                <path d="M1750 85 l0 -65 45 0 c35 0 45 4 45 16 0 12 -7 15 -30 12 l-30 -5 0
                                54 c0 40 -4 53 -15 53 -12 0 -15 -14 -15 -65z"/>
                                <path d="M1871 85 c1 -47 6 -65 15 -65 10 0 14 17 14 65 0 52 -3 65 -15 65
                                -13 0 -15 -12 -14 -65z"/>
                                <path d="M1930 140 c0 -5 11 -10 25 -10 24 0 25 -3 25 -55 0 -30 5 -55 10 -55
                                6 0 10 25 10 56 0 55 1 56 25 50 18 -5 25 -2 25 9 0 12 -13 15 -60 15 -33 0
                                -60 -4 -60 -10z"/>
                                <path d="M2090 128 c-27 -30 -23 -65 12 -91 35 -26 75 -15 97 25 14 25 14 29
                                -5 55 -28 37 -74 42 -104 11z m78 -10 c34 -34 -6 -90 -48 -68 -35 19 -20 80
                                20 80 9 0 21 -5 28 -12z"/>
                                </g>
                            </svg>

                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <div class="relative">
                                        <button
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                            type="button"
                                            id="dropdownLoginButton"
                                            data-dropdown-toggle="dropdownLoginMenu"
                                            aria-expanded="false"
                                        >
                                            Log in
                                        </button>

                                        <!-- Dropdown Menu -->
                                        <div id="dropdownLoginMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-white dark:ring-opacity-30">
                                            <div class="py-1">
                                                <!-- Admin Login Option -->
                                                <a href="{{ route('login') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    Admin
                                                </a>
                                                <!-- Employee Login Option -->
                                                <a href="{{ route('empleados.login') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    Empleado
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <a
                                href="#"
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                <!--Imagen versión blanca-->    
                                <!-- <img
                                        src="https://laravel.com/assets/img/welcome/docs-light.svg"
                                        alt="Laravel documentation screenshot"
                                        class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                        onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        "
                                    /> -->
                                    <img
                                        src="https://static.vecteezy.com/system/resources/thumbnails/027/736/449/small_2x/supermarket-anime-visual-novel-game-generate-ai-photo.jpg"
                                        alt="Laravel documentation screenshot"
                                        class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                    />
                                    <div
                                        class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                    ></div>
                                </div>

                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                        </svg>
                                        </div>

                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-xl font-semibold text-black dark:text-white">Supermercado Emanuelito</h2>

                                            <p class="mt-4 text-sm/relaxed">
                                            Sistema de Control de Asistencia de Empleados.
                                            </p>
                                        </div>
                                    </div>

                                    
                                </div>
                            </a>

                            <a
                                href="#"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Registro de Empleados</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                    Añade y gestiona los datos de los empleados fácilmente.
                                    </p>
                                </div>

                            </a>

                            <a
                                href="#"
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-r-square-fill" viewBox="0 0 16 16">
                                <path d="M6.835 5.092v2.777h1.549c.995 0 1.573-.463 1.573-1.36 0-.913-.596-1.417-1.537-1.417z"/>
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.5 4.002h3.11c1.71 0 2.741.973 2.741 2.46 0 1.138-.667 1.94-1.495 2.24L11.5 12H9.98L8.52 8.924H6.836V12H5.5z"/>
                                </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Registro de Asistencia</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                    Controla las entradas y salidas de tus empleados.
                                    </p>
                                </div>

                                
                            </a>

                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z"/>
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                                </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Reportes</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Consulta estadísticas y genera reportes detallados.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </main>


                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
        
    <script>
        // Script to toggle the dropdown visibility
        document.getElementById('dropdownLoginButton').addEventListener('click', function() {
            const menu = document.getElementById('dropdownLoginMenu');
            menu.classList.toggle('hidden');
        });

        // Close the dropdown if clicked outside
        window.addEventListener('click', function(event) {
            const menu = document.getElementById('dropdownLoginMenu');
            if (!event.target.closest('.relative')) {
                menu.classList.add('hidden');
            }
        });
    </script>
    </body>
</html>
