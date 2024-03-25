{{--
Template Name: Pattern Library
--}}

@php
  $query = new WP_Query(['post_type' => 'post']);

  wp_reset_postdata();

  $args = array(
    'post_type' => 'football_teams',
    'posts_per_page' => 2, // Adjust this value as needed
  );

  $football_query = new WP_Query($args);
  // dd($football_query->posts[0]->ID);
  wp_reset_postdata();
@endphp

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
  <h2>Hero Front Page</h2>
  <p>Added to the top of the front page. Consists of hero_image: An image field for uploading a hero image. The image can be of the types 'jpg', 'jpeg', 'png', or 'svg'.

    hero image position: A select field for choosing the position of the hero image. The choices are 'Center', 'Top', 'Bottom', 'Left', and 'Right', with 'Center' as the default value.
  
    Hero Content: This is a tab for organizing the fields in the WordPress editor.
  
    hero title: A text field for entering the hero title.
  
    highlighted text: This is a repeater field that allows you to add multiple sets of sub-fields. Each set of sub-fields includes a text field for entering highlighted text.
  
    impact text: This is another repeater field that allows you to add multiple sets of sub-fields. Each set of sub-fields includes a text field for entering impact text.
  
    hero content: A WYSIWYG (What You See Is What You Get) editor field for entering the hero subtitle. Media upload is disabled.
  
    show button: A radio button field for choosing whether to show a button. The choices are 'Yes' and 'No', with 'No' as the default value.
  
    cta button: This is a group of fields for defining a call-to-action (CTA) button. It includes a set of fields defined in the Button class (shown if show_button is 'Yes').
  </p>
  <br>
  <br>
  <br>
  <br>
  @include('blocks.hero-front-page', [
    'hero_icon' => null,
    'hero_image' => ['sizes' => ['2048x2048' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
    'hero_image_position' => 'center center',
    'hero_title' => 'Hero title example.',
    'highlighted_text' => [
      ['text_string' => 'example.'],
    ],
    'impact_text' => [
      ['text_string' => 'Impact text 1'],
      ['text_string' => 'Impact text 2'],
      ['text_string' => 'Impact text 3']
    ],
    'hero_content' => '<p>Hero subtitle - Lorem ipsum dolor sit amet: consectetur sadipscing. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>',
    'show_button' => 'yes',
    'cta_button' => ['link' => '#', 'text' => 'Button text', 'type' => 'primary', 'btn_colour' => '']
  ])
  
</section>

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
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
        'linkedin' => 'https://www.linkedin.com/'
      ],
      [
        'name' => 'Person 2',
        'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius. Lorem ipsum dolor sit. Lorem ipsum dolor sit amet amet in explicabo!',
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
        'linkedin' => 'https://www.linkedin.com/'
      ],
      [
        'name' => 'Person 3',
        'bio' => 'Bio text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/800x800'], 'alt' => 'alt text'],
        'linkedin' => 'https://www.linkedin.com/'
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
  <h2>Download</h2>
  <p>Displays a single download. Consists of title: Layout, default and full width background options. A group of fields for the title. This group consits of title text field, heading level and heading style.
    cover_image: An image field for uploading a cover image of the document.
    description: A textarea field for entering a description of the document.
    file: A file field for uploading the document.</p>
  @include('blocks.download', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'yellow',
    'layout' => 'default',
    'download_file' => ['url' => 'https://example.com/wp-content/uploads/2021/01/example.pdf', 'filename' => 'example.pdf'],
    'download_image' => ['url' => 'https://placehold.co/800x800', 'alt' => 'Example Image'],
    'title_style' => ['title' => 'Downloads Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
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
  <h2>Full Image</h2>
  <p>Displays a full width image. Consists of image: An image field for uploading an image.</p>
  @include('blocks.full-image', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'image' => ['url' => 'https://picsum.photos/1000/400', 'alt' => 'alt text'],
    'full_image_position' => 'center',
    'image_height' => 800
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

{{-- <section class="flow block-padding--bottom">
  <h2>Carousel</h2>
  <p>Displays a carousel of images. Consists of images: A repeater field for adding images. Each image consists of an image field for uploading an image, a text field for entering a title, and a textarea field for entering a description.</p>
  @include('blocks.carousel', [
    'wrapper' => '',
    'spacing_size' => '',
    'title_style' => ['title' => 'Image Carousel', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'slider_type' => 'slider-images',
    'slides' => [
        [
            'image' => ['sizes' => ['medium_large' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
            'title' => 'Slide 1',
            'subtitle' => 'Subtitle 1',
            'content' => 'Content 1',
        ],
        [
            'image' => ['sizes' => ['medium_large' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
            'title' => 'Slide 2',
            'subtitle' => 'Subtitle 2',
            'content' => 'Content 2',
        ],
        [
            'image' => ['sizes' => ['medium_large' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
            'title' => 'Slide 3',
            'subtitle' => 'Subtitle 3',
            'content' => 'Content 3',
        ],
    ],
  ])
</section> --}}

<section class="flow block-padding--bottom">
  <h2>Card row</h2>
  <p>Display a row of card upto 4 max. Card inc image, title, and link/button. Title and link/button are optional.

  @include('blocks.card-row', [
    'wrapper' => '',
    'spacing_size' => '',
    'title_style' => ['title' => 'Card row title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'items' => [
      [
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/500x300'], 'alt' => 'alt text'],
        'title' => 'Card title',
        'link' => '#', 
        'text' => 'Button text', 
        'type' => 'primary', 
        'btn_colour' => 'dark-green'
      ],
      [
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/500x300'], 'alt' => 'alt text'],
        'title' => 'Card title 2',
        'link' => '#', 
        'text' => 'Button text', 
        'type' => 'primary', 
        'btn_colour' => 'black'
      ],
      [
        'image' => ['sizes' => ['medium_large' => 'https://placehold.co/500x300'], 'alt' => 'alt text'],
        'title' => 'Card title 3',
        'link' => '#', 
        'text' => 'Button text', 
        'type' => 'primary', 
        'btn_colour' => 'raspberry'
      ],
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

<section class="flow block-padding--bottom">
  <h2>Quote</h2>
  <p>Displays a quote. Consists of quote style: A radio button field for selecting the style of quote to use. The choices are 'Short' and 'Long'.

    quote text: A textarea field for entering the quote text. 

    quote author: A text field for entering the quote author.</p>
  @include('blocks.quote', [
    'block' => (object) ['classes' => ''],
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'style' => 'short',
    'text' => 'Quote text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
    'author' => 'Quote author, author job title etc'
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>Custom Grid</h2>
  <p>A simple Custom Grid block. Can be used to display a grid of items. 

  Consists of grid type: A select field for choosing the type of grid to display. The choices are 'Icons' and 'Standard', with 'Standard' as the default value.
  Standard allows you to add a title, description and a grid of statistic items.
  
  Icons allows you to add a title, description and a grid of icons.
  

  title: This is a set of fields defined in the Title class.

  body: A textarea field for entering a subtitle or body text.

  items: This is a repeater field that allows you to add multiple sets of sub-fields. Each set of sub-fields includes a number field for entering a statistic number (shown if grid_type is 'Standard'), an image field for uploading an icon (shown if grid_type is 'Icons'), and a textarea field for entering a description (shown if grid_type is 'Standard').</p>
  @include('blocks.custom-grid', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'impact_word_enable' => 'no',
    'impact_word' => '',
    'impact_word_position' => '',
    'title_style' => ['title' => 'Custom Grid - stats', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
    'grid_type' => 'default',
    'items' => [
      [
        'item' => '156',
        'description' => 'Description 1'
      ],
      [
        'item' => '24',
        'description' => 'Description 2'
      ],
      [
        'item' => '3101',
        'description' => 'Description 3'
      ],
      [
        'item' => '455',
        'description' => 'Description 4'
      ]
    ],
    'show_button' => 'no',
    'btn_type' => '',
    'btn_link' => '',
    'btn_text' => '',
    'btn_colour' => ''
  ])

  @include('blocks.custom-grid', [
    'wrapper' => '',
    'spacing_size' => '',
    'background_colour' => 'off-white',
    'impact_word_enable' => 'no',
    'impact_word' => '',
    'impact_word_position' => '',
    'title_style' => ['title' => 'Custom Grid - icons', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'body' => 'Body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
    'grid_type' => 'icons',
    'items' => [
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text']
      ],
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
      ],
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
      ],
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
      ],
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text']
      ],
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
      ],
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
      ],
      [
        'icon' => ['sizes' => ['thumbnail' => 'https://placehold.co/150x150'], 'alt' => 'alt text'],
      ]
    ],
    'show_button' => 'no',
    'btn_type' => '',
    'btn_link' => '',
    'btn_text' => '',
    'btn_colour' => ''
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>Two Column Content</h2>
  <p>
    Two column content block. Consists of block layout: A radio button field for selecting the vertical alignment of content when one column is taller than the other. The choices are 'Align to top', 'Align to centre', and 'Align to bottom', with 'Align to centre' as the default value.

    Column 1 and Column 2: These are tabs for organizing the fields in the WordPress editor. Each column has the following fields:

    content: A select field for choosing the type of content to add to the column. The choices are 'Text', 'Image', 'Video', and 'Quote', with 'Text' as the default value.

    quote style: A radio button field for selecting the style of quote to use. The choices are 'Short' and 'Long'. This field is only shown if the content type is 'Quote'.

    quote text: A textarea field for entering the quote text. This field is only shown if the content type is 'Quote'.

    quote author: A text field for entering the quote author. This field is only shown if the content type is 'Quote'.

    text: A WYSIWYG (What You See Is What You Get) editor field for entering text. This field is only shown if the content type is 'Text'.

    image: An image field for uploading an image. This field is only shown if the content type is 'Image'.

    video: A text field for entering a video URL. This field is only shown if the content type is 'Video'.</p>
  </p>

  <h3>Two column - text</h3>
  @include('blocks.two-column-content', [
    'wrapper' => '',
    'spacing_size' => '',
    'align_layout' => 'align-to-top',
    'content_1' => 'text',
    'text_1' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
    'content_2' => 'text',
    'text_2' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
  ])

  <h3>Two column - image</h3>
  @include('blocks.two-column-content', [
    'wrapper' => '',
    'spacing_size' => '',
    'align_layout' => 'align-to-top',
    'content_1' => 'image',
    'image_1' => ['url' => 'https://placehold.co/800x800', 'alt' => 'alt text'],
    'content_2' => 'text',
    'text_2' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
  ])

  <h3>Two column - video</h3>
  @include('blocks.two-column-content', [
    'wrapper' => '',
    'spacing_size' => '',
    'align_layout' => 'align-to-top',
    'content_1' => 'video',
    'video_url_1' => 'https://www.youtube.com/watch?v=KuiidoLf8_g',
    'content_2' => 'text',
    'text_2' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
  ])

  <h3>Two column - quote</h3>
  @include('blocks.two-column-content', [
    'wrapper' => '',
    'spacing_size' => '',
    'align_layout' => 'align-to-top',
    'background_colour' => 'off-white',
    'content_1' => 'text',
    'text_1' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p><p>Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>',
    'content_2' => 'quote',
    'style_2' => 'short',
    'style' => 'short',
    'quote_2' => 'Quote text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor eius in explicabo!',
    'author_2' => 'Quote author, author job title etc'
  ])
</section>

<section class="flow block-padding--bottom">
  <h2>Archive Posts</h2>
  <p>Displays a grid of posts. Consists of title: This is a set of fields defined in the Title class.

    body: A WYSIWYG (What You See Is What You Get) editor field for entering content. Media upload is disabled, and it uses the 'basic' toolbar.

    posts: This is a repeater field that allows you to add multiple sets of sub-fields. Each set of sub-fields includes a post object field for selecting a post.</p>
  @if($query->have_posts())
    @include('blocks.archive-posts', [
      'wrapper' => '',
      'spacing_size' => '',
      'title_style' => ['title' => 'Archive Posts Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
      'latest_posts_type' => 'post',
    ])
  @endif
</section>

<section class="flow block-padding--bottom">
  <h2>Results</h2>
  <p>Displays the latest results of 2 selected football teams. Consists of Team One and Team Two: These are tabs for organizing the fields in the WordPress editor. Each team has the following fields:

    team one and team two: A post object field for selecting a post of the 'football teams' post type. The selected post is returned as an object.
  
    team one title and team two title: A text field for entering a title.
  
    team one body and team two body: A WYSIWYG (What You See Is What You Get) editor field for entering sub text. Media upload is disabled, and it uses the 'basic' toolbar.</p>
    <br>
  @if ($football_query->have_posts() && $football_query->post_count > 1)
    @include('blocks.results', [
      'wrapper' => '',
      'spacing_size' => '',
      'team_one' => $football_query->posts[0],
      'team_one_title' => 'Team One',
      'team_one_body' => 'Team One body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.',
      'team_two' => $football_query->posts[1],
      'team_two_title' => 'Team Two',
      'team_two_body' => 'Team Two body text - Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit.',
    ])
  @else
    <p>Not enough teams to display results. Add at least 2 teams under the football teams post type</p>
  @endif
  
</section>

<section class="flow block-padding--bottom">
  <h2>Timeline</h2>
  <p>Displays a timeline of events. Consists of title: This is a set of fields defined in the Title class.

    cards: This is a repeater field that allows you to add multiple sets of sub-fields. Each set of sub-fields includes a date field for entering a date, a title field for entering a card title, and a text field for entering a description.</p>

  @include('blocks.timeline', [
    'wrapper' => '',
    'spacing_size' => '',
    'title_style' => ['title' => 'Timeline Title', 'heading_level' => 'h2', 'heading_style' => 'h2'],
    'cards' => [
      [
        'card_year' => '2020',
        'card_title' => 'Card title 1',
        'card_text' => 'Card description 1'
      ],
      [
        'card_year' => '2021',
        'card_title' => 'Card title 2',
        'card_text' => 'Card description 2'
      ],
      [
        'card_year' => '2022',
        'card_title' => 'Card title 3',
        'card_text' => 'Card description 3'
      ],
      [
        'card_year' => '2023',
        'card_title' => 'Card title 4',
        'card_text' => 'Card description 4'
      ]
    ]
  ])
</section>

@endwhile
@endsection