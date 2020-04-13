This theme is lightning fast and easy to set up. Follow the documentation below for a full understanding of how to set templates and styles up.

# Webpack Set Up

The Webpack config is used for compiling, autoprefixing, and altogether making things a little more organized. It allows us to keep each SASS and JS file in folders based on their WordPress template. Below is the documentation for setting up both webpack and enqueueing your styles/js in WordPress.


1. In `webpack.config.js`, add your input file path in the entry object. For example, if we were creating an about page template, you would add `about: "./src/templates/about/index"`.
2. In `/src/templates/`, add your new template folder and files. Following our example, we would create an about folder, with index.js, about-scripts.js, and about-styles.scss files inside of it.
3. In our new index.js file, import the global styles, global scripts, and the new about script and style files. Take a look at `/home/index.js` to see an example (you can likely copy this and change out what you need).

### As of now, your Webpack config is set up! Now we need enqueue the new styles and scripts in WordPress.

In `/functions/enqueue.php`, we will register our scripts/styles and add a little logic to make sure they only are applied to the template that they are for. This is done to help with page speeds, as we will not have a bunch of css and js files being loaded for every page. Below we can see what we currently have in `/functions/enqueue.php`.

```php
function wp_base_scripts() {

  wp_register_script( 'wp_base-main', get_template_directory_uri() . '/dist/main.bundle.js', array(), date("H:i:s"), true );
  wp_register_script( 'wp_base-home', get_template_directory_uri() . '/dist/home.bundle.js', array(), date("H:i:s"), true );
  wp_register_script( 'wp_base-press', get_template_directory_uri() . '/dist/press.bundle.js', array(), date("H:i:s"), true );

  if(is_front_page()){
    wp_enqueue_style( 'wp_base-home-style', get_template_directory_uri() . '/dist/css/home.css', array(), date("H:i:s"));
    wp_enqueue_script('wp_base-home');
  } else if (is_page('press') || is_singular()) {
    wp_enqueue_style( 'wp_base-press', get_template_directory_uri() . '/dist/css/press.css', array(), date("H:i:s"));
    wp_enqueue_script('wp_base-press');
  } else {
    wp_enqueue_style( 'wp_base-style', get_template_directory_uri() . '/dist/css/main.css', array(), date("H:i:s"));
    wp_enqueue_script('wp_base-main');
  }
}

add_action( 'wp_enqueue_scripts', 'wp_base_scripts' );
```

Each of the current templates have their own scipts/styles registered and enqueued for that template only, according to the if statement. You can use the WordPress function `is_page()` to add the logic for your template. Be sure to keep the main css/js files as the default ending else statement. If you're wondering where the `/dist/css/` folder/files come from - that's the output we get from running webpack. Follow the documentation below to finish enqueueing your scipts/styles.

1. Following our example, create an about.php file on the top theme level. Make sure to add the template name in the structure defined below.
```php
/*
  Template Name: About
  */
```

2. Now in `/functions/enqueue.php`, set up your logic in the if statement. You will need an `else if` after the second one (the press template one), and use `is_page('about')` to make sure the script/style files only show for that template.

3. Now add the `wp_register_script()`, `wp_enqueue_style()`, and `wp_enqueue_script()` for your scripts/styles. Follow the convention thats already been set up - you can pretty much just copy and paste, and then change out what you need.

For example: `wp_enqueue_style( 'wp_base-about', get_template_directory_uri() . '/dist/css/about.css', array(), date("H:i:s"));`

### You are officially all set up! Now you just need to add some code to your about.php template, and then create a page in the WordPress admin using that template.

---

# To get Webpack running

1. cd into theme folder
2. npm install
3. npm run dev:watch to watch changes in scss/js files - this will create your /dist/ folder
