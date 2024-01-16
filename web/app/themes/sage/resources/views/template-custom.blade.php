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
  <h2>Paragraphs/Text</h2>
  <p>Standard text block. Used for all text that sits outside a custom block e.g. blog content.</p>
  <p>Consists of style: This is a radio button field for selecting the style of the text. The choices are 'Default' and 'Standfirst', with 'Default' as the default value. The 'Standfirst' option is described as a larger, bolder style for introductory text.

    text: This is a WYSIWYG (What You See Is What You Get) field for entering the text for the block. It does not allow media uploads, only displays the visual tab, and uses a basic toolbar. The instructions suggest that you can add bullet lists, numbered lists, bold text, italic text, links, and more.</p>
  @include('blocks.text', [
    'block' => (object) ['classes' => ''],
    'text' => '<p>EXAMPLE Default style - Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
    'wrapper' => '',
    'spacing_size' => '',
    'style' => 'body',
  ])
  @include('blocks.text', [
    'block' => (object) ['classes' => ''],
    'text' => '<p>EXAMPLE Standfirst style - Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
    'wrapper' => '',
    'spacing_size' => '',
    'style' => 'standfirst',
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>Buttons</h2>
  <p>Example buttons. Two options primary or donate. Donate auto populates the button text and url(donate link set in Theme options). Able to choose button position, left, center, right. Different colour options.</p>
  @include('blocks.button-block', [
    'block' => (object) ['classes' => 'block-padding--bottom'],
    'wrapper' => '',
    'spacing_size' => '',
    'btn_position' => 'center',
    'btn_type' => 'primary',
    'btn_colour' => 'raspberry',
    'btn_link' => '#',
    'btn_text' => 'Raspberry button'
  ])
  @include('blocks.button-block', [
    'block' => (object) ['classes' => 'block-padding--bottom'],
    'wrapper' => '',
    'spacing_size' => '',
    'btn_position' => 'left',
    'btn_type' => 'primary',
    'btn_colour' => 'black',
    'btn_link' => '#',
    'btn_text' => 'black button'
  ])
@include('blocks.button-block', [
  'block' => (object) ['classes' => 'block-padding--bottom'],
  'wrapper' => '',
  'spacing_size' => '',
  'btn_position' => 'right',
  'btn_type' => 'donate',
  'btn_colour' => 'dark-green',
  'btn_link' => '#',
  'btn_text' => 'Donate'
])

<section class="flow block-padding--bottom">
  <h2>Page Hero</h2>
  <p>Added to the top of pages. Consists of colour_picker: A radio button field for selecting a color. The choices are 'White', 'Off White', and 'Yellow', with 'White' as the default value.
    show_hero_image: A select field for choosing whether to show the hero image (default is 'No').
    hero_image: An image field for uploading the hero image. This field is only displayed if 'Yes' is selected for 'show_hero_image'.
    hero_image_position: A select field for choosing the image position. This field is also only displayed if 'Yes' is selected for 'show_hero_image'.
    hero_title: A text field for entering the hero title.
    hero_content: A WYSIWYG (What You See Is What You Get) field for entering the hero subtitle.</p>
  @include('blocks.hero', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'yellow',
    'show_hero_image' => 'yes',
    'hero_image' => ['url' => 'https://placehold.co/800x800', 'alt' => 'alt text'],
    'hero_image_position' => 'center center',
    'hero_title' => 'Hero title',
    'hero_content' => 'Hero subtitle - Lorem ipsum dolor sit amet: consectetur sadipscing.',
    'hero_button' => ['link' => '#', 'text' => 'Button text', 'type' => 'primary', 'btn_colour' => '']
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
</section>

<section class="flow block-padding--bottom">
  <h2>Blog Hero</h2>
  <p>Added to the top of each blog post. Option to pick background colour and display the blogs featured image. Hero title is auto generated from the page title. If no custom image selected the PIF logo will be displayed as a large image instead. Any categories assigned to the blog post will also show next to Blog | category 1, category 2 etc.</p>
  <p>Second example uses the featured image.</p>
  @include('blocks.blog-hero', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'show_hero_image' => 'no',
  ])

@include('blocks.blog-hero', [
  'wrapper' => '',
  'spacing_size' => '',
  'background_colour' => 'yellow',
  'show_hero_image' => 'yes',
  'hero_image_position' => 'center center',
  'hero_image' => 'https://placehold.co/800x800',
])
</section>

<section class="flow block-padding--bottom">
  <h2>Author</h2>
  <p>Displays the author of the blog. This block should be used immediately after each blog hero. Consists of select user: A drop down select. Default is the blog author, but able to select another author if adding content for other users.</p>
  @include('blocks.author', [
    'wrapper' => '',
    'spacing_size' => '',
    'selected_user' => '',
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>People</h2>
  <p>Displays a list of people. Consists of title: A message field.
    people: A repeater field for adding people. Each person consists of a name field, a WYSIWYG (What You See Is What You Get) editor for entering the person's bio, and an image field for uploading the person's photo.</p>
  @include('blocks.people', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'title_style' => ['title' => 'People Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'people' => [
      [
        'name' => 'Person 1',
        'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text']
      ],
      [
        'name' => 'Person 2',
        'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius. Lorem ipsum dolor sit. Lorem ipsum dolor sit amet amet in explicabo!',
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text']
      ],
      [
        'name' => 'Person 3',
        'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text']
      ]
    ]
  ])
</section>

<section class="flow block-padding--bottom">
<h2>Stacked Media</h2>
<p>Displays upto 3 items of media(image or video). Content is stacked vertically. Consists of Enable impact_word_enable: A true/false field for selecting whether to display an impact word. The default value is '0' (false).
  impact_word: A text field for entering the impact word.
  impact_word_position: A select field for choosing the position of the impact word. The choices are 'Left' and 'Right', with 'Left' as the default value.
  block_title: Text input for the block title.
  items: A repeater field for adding items. Each item consists of a select field for choosing the type of media (image/video), an image field for uploading an image, and a URL field for entering the video url</p>
</p>
@include('blocks.stacked-media', [
  'wrapper' => '',
  'spacing_size' => '',
  'background_colour' => 'off-white',
  'impact_word_enable' => 'yes',
  'impact_word' => 'Impact word',
  'impact_word_position' => 'left',
  'title_style' => ['title' => 'Stacked Media Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
  'items' => [
    [
      'media_type' => 'image',
      'image' => ['url' => 'https://placehold.co/1000x1000', 'alt' => 'alt text']
    ],
    [
      'media_type' => 'video',
      'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/r98ColIPrNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
    ],
    [
      'media_type' => 'image',
      'image' => ['url' => 'https://placehold.co/1000x1000', 'alt' => 'alt text']
    ]
  ]
])
</section>

<section class="flow block-padding--bottom">
  <h2>Downloads</h2>
  <p>Displays a grid of downloadable files. Consists of impact_word_enable: A true/false field for selecting whether to display an impact word. The default value is '0' (false).
    impact_word: A text field for entering the impact word.
    impact_word_position: A select field for choosing the position of the impact word. The choices are 'Left' and 'Right', with 'Left' as the default value.
    title: A group of fields for the title. This group consits of title text field, heading level and heading style.
    documents: A repeater field for adding downloads. Each download consists of an image field for uploading a cover image of the document, a text field for entering the document title and an upload field for adding the document.</p>
  @include('blocks.downloads', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'impact_word_enable' => 'yes',
    'impact_word' => 'Impact word',
    'impact_word_position' => 'left',
    'title_style' => ['title' => 'Downloads Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'download_grid' => [
      [
        'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
        'download_image_orientation' => 'portrait',
        'title' => 'Download portrait title',
        'description' => 'Download description',
        'download_file' => ['url' => 'https://placehold.co/800x800']
      ],
      [
        'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
        'download_image_orientation' => 'portrait',
        'title' => 'Download portrait title',
        'description' => 'Download description',
        'download_file' => ['url' => 'https://placehold.co/800x800']
      ],
      [
        'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
        'download_image_orientation' => 'portrait',
        'title' => 'Download portrait title',
        'description' => 'Download description',
            'download_file' => ['url' => 'https://placehold.co/800x800']
      ],
      [
        'download_image' => ['sizes' => ['medium_large' => 'https://placehold.co/400x400'], 'alt' => 'alt text'],
        'download_image_orientation' => 'landscape',
        'title' => 'Download landscape title',
        'description' => 'Download description',
        'download_file' => ['url' => 'https://placehold.co/400x400']
      ]
    ]
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>Featured posts</h2>
  <p>Displays a grid of featured posts. Consists of Title: This is a set of fields defined in the Title class.

    featured_post_type: A select field for choosing whether to display the latest posts or specific featured posts.

    featured_posts: This is a repeater field that allows you to add multiple sets of sub-fields. Each set of sub-fields includes a post object field for selecting a post. This field is only shown if featured_post_type is set to 'featured'.

    number_of_posts: A select field for choosing the number of posts to display. This field is only shown if featured_post_type is set to 'latest'.

    load_more_text: A text field for entering the text to display on the load more button. This field is only shown if number_of_posts is set to 'All'.</p>
    @include('blocks.featured-posts', [
      'wrapper' => '',
      'spacing_size' => '',
      'background_colour' => 'off-white',
      'impact_word_enable' => 'yes',
      'impact_word' => 'Impact word',
      'impact_word_position' => 'left',
      'title_style' => ['title' => 'Featured Posts Title - 4 cards', 'heading_level' => 'h2', 'heading_style' => 'h2'],
      'featured_post_type' => 'latest',
      'latest_posts_type' => 'posts',
      'number_of_posts' => '4',
    ])
</section>

<section class="flow block-padding--bottom">
  <h2>Partners</h2>
  <p>Displays a grid of partner logos. Consists of Title: This is a set of fields defined in the Title class.

    body: A WYSIWYG (What You See Is What You Get) editor field for entering content. Media upload is disabled, and it uses the 'basic' toolbar.
  
    partners: This is a repeater field that allows you to add multiple sets of sub-fields. Each set of sub-fields includes an image field for uploading a logo, a text field for entering a name, a textarea field for entering a description, and a URL field for entering a URL.</p>
  @include('blocks.partners', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'impact_word_enable' => 'yes',
    'impact_word' => 'partners.',
    'impact_word_position' => 'right',
    'title_style' => ['title' => 'Partners Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
    'partners' => [
      [
        'logo' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
        'name' => 'Partner 1',
        'description' => 'Partner description with an external link',
        'url' => '#'
      ],
      [
        'logo' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
        'name' => 'Partner 2',
        'description' => 'Partner description with an external link',
        'url' => '#'
      ],
      [
        'logo' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
        'name' => 'Partner 3',
        'description' => 'Partner description with no link',
        'url' => ''
      ]
    ]
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>Text with media</h2>
  <p>
    Text with media block Consists of title: This is a set of fields defined in the Title class.

    title_align: A radio button field for selecting the alignment of the title. The choices are 'Left', 'Centre', and 'Right', with 'Left' as the default value.

    body: A WYSIWYG (What You See Is What You Get) editor field for entering content. Media upload is disabled, and it uses the 'basic' toolbar.

    media_type: A radio button field for selecting the type of media to display. The choices are 'Image' and 'Video', with 'Image' as the default value.

    image: An image field for uploading an image. This field is only shown if media_type is set to 'image'.

    video: An oEmbed field for entering a video URL. This field is only shown if media_type is set to 'video'.
  </p>
  @include('blocks.text-with-media', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'impact_word_enable' => 'yes',
    'impact_word' => 'Impact word',
    'impact_word_position' => 'left',
    'title_style' => ['title' => 'Text with media - image', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'title_align' => 'left',
    'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
    'media_type' => 'image',
    'image' => ['url' => 'https://placehold.co/1000x1000', 'alt' => 'alt text'],
    'video' => ''
  ])
  @include('blocks.text-with-media', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'impact_word_enable' => 'no',
    'impact_word' => '',
    'impact_word_position' => '',
    'title_style' => ['title' => 'Text with media - video - no impact word', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'title_align' => 'left',
    'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
    'media_type' => 'video',
    'image' => '',
    'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/r98ColIPrNA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
  ])
</section>

@endwhile
@endsection