{{--
Template Name: Pattern Library
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
@include('partials.page-header')

{{-- USE THE FOLLOWING IN COPILOT CHAT TO GENERATE DESCRIPTIONS - Describe this block to me from the selected code --}}

<section class="flow block-padding--bottom">
  <h2>Heading block</h2>
  <p>Consists of text: A textarea field for entering the heading text.
    heading_style: A radio button field for selecting the heading style. The choices are 'H1', 'H2', 'H3', 'H4', 'H5', and 'H6', with 'H2' as the default value. The selected value will only affect the appearance of the heading, not its semantic level.
    heading_semantics: A radio button field for selecting the semantic level of the heading. The instructions suggest using progressively smaller headings across blocks as you go down the page. This will not affect the appearance of the heading, only its semantic level, and is for both SEO and accessibility purposes.
    text_alignment: A radio button field for selecting the text alignment. The choices are 'Left', 'Center', and 'Right', with 'Left' as the default value.
    enable_text_colour: A true/false field for selecting whether to use a custom text color. The default value is '0' (false).
    colour_picker: A radio button field for selecting the text color. The choices are generated elsewhere in the code. This field is only displayed if 'enable_text_colour' is set to '1' (true).
    enable_text_background: A true/false field for selecting whether to use a custom background color. The default value is '0' (false).
    text_background_colour: A radio button field for selecting the heading background color. The choices are generated elsewhere in the code. This field is only displayed if 'enable_text_background' is set to '1' (true).</p>
  {{-- Heading --}}
  @include('blocks.heading', [
      'block' => (object) ['classes' => 'block-padding--bottom'],
      'text_alignment' => 'center',
      'enable_text_background' => true,
      'text_background_colour' => 'yellow',
      'enable_text_colour' => true,
      'text_colour' => 'charcoal',
      'text' => 'H1 with background colour',
      'heading_style' => 'h1',
      'heading_semantics' => 'h1',
      'wrapper' => '',
      'spacing_size' => ''
    ])

  {{-- Heading --}}
  @include('blocks.heading', [
    'block' => (object) ['classes' => 'block-padding--bottom'],
    'text_alignment' => 'center',
    'enable_text_background' => false,
    'text_background_colour' => '',
    'enable_text_colour' => true,
    'text_colour' => 'charcoal',
    'text' => 'H2 without background colour',
    'heading_style' => 'h2',
    'heading_semantics' => 'h2',
    'wrapper' => '',
    'spacing_size' => ''
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>CTA Banner</h2>
  <p>Consits of block_title: A message field that simply displays the label "CTA Banner".
    colour_picker: A radio button field for selecting a color. The default value is 'off-white'.
    Content: A tab containing a title field and a WYSIWYG (What You See Is What You Get) editor for entering the body content.
    Image: A tab containing an option to add an image (yes/no), an image field that is displayed if 'yes' is selected, and a select field for choosing the image position (left/right).
    Layout: A tab containing a select field for choosing the layout of the CTA Banner. This tab is displayed if 'no' is selected for the 'add_image' field.
    Button: A tab containing an option to show a button (yes/no), and a group of fields for the button that are displayed if 'yes' is selected.</p>
</section>
{{-- CTA - contained --}}
@include('blocks.cta-banner', [
  'layout' => 'contained',
  'background_colour' => 'yellow',
  'wrapper' => 'container',
  'spacing_size' => 'spacing-lg',
  'title_style' => ['title' => 'CTA - variation contained', 'heading_level' => 'h2',
  'heading_style' => 'h2'],
  'body' => 'Body text - Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor eius in explicabo!',
  'image' => [],
  'show_button' => 'yes',
  'cta_button' => ['link' => '#', 'text' => 'Button text', 'type' =>'primary', 'btn_colour' => '']
])

{{-- CTA - default --}}
@include('blocks.cta-banner', [
  'layout' => '',
  'background_colour' => 'dark-green',
  'wrapper' => '',
  'spacing_size' => '',
  'title_style' => ['title' => 'CTA - variation default', 'heading_level' => 'h2',
  'heading_style' => 'h2'],
  'body' => 'Body text - Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor eius in explicabo!',
  'image' => [],
  'image_position' => 'left',
  'show_button' => 'yes',
  'cta_button' => ['link' => '#', 'text' => 'Button text', 'type' => 'primary', 'btn_colour' => '']
])

{{-- CTA - full --}}
@include('blocks.cta-banner', [
  'layout' => 'full', 
  'background_colour' => 'raspberry', 
  'wrapper' => '', 
  'spacing_size' => '', 
  'title_style' => ['title' => 'CTA - variation full', 'heading_level' => 'h2', 'heading_style' => 'h2'],
  'body' => 'Body text - Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor eius in explicabo!', 
  'image' => ['url' => 'https://placehold.co/800x800', 'alt' => 'alt text'], 'image_position' => 'left','show_button' => 'yes',
  'cta_button' => ['link' => '#', 'text' => 'Button text', 'type' => 'primary', 'btn_colour' => '']
])


@endwhile
@endsection