<?php
/*
Plugin Name:  Moumou plugin
Plugin URI: http://www.ajitchri.com
Description: je suis une apprenante a Youcode et c'est mon 1er plugin 
Version: 1.0
Author: Moumou
Author URI: http://www.ajitchri.com
*/

// Ajouter le menu du plugin dans l'administration
add_action('admin_menu', 'mon_plugin_menu');


// Ajouter la page de paramètres du plugin
function mon_plugin_page()
{
?>
  <!-- BEGIN parsley css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
  <!-- END parsley css-->

  <!-- BEGIN Tailwind-->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- END Tailwind-->

  <!-- ******************************************************* -->
  <div class="w-full flex items-center justify-center my-12">
    <div class="bg-white dark:bg-gray-800 shadow rounded py-16 lg:px-28 px-8">
      <p class="md:text-3xl text-xl font-bold leading-7 text-center text-gray-700 dark:text-white">Contact</p>
      <form action="<?php echo admin_url('admin-post.php'); ?>" method="post" id="contact-form" data-parsley-validate>
        <input type="hidden" name="action" value="mon_plugin_submit_form">
        <div class="md:flex items-center mt-12">
          <div class="md:w-72 flex flex-col">
            <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">First Name</label>
            <input name="first_name" type="text" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-400" required />
          </div>
          <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
            <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Last name</label>
            <input name="last_name" type="text" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" required />
          </div>
        </div>
        <div class="md:flex items-center mt-8">
          <div class="md:w-72 flex flex-col">
            <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Email</label>
            <input name="email" role="input" type="email" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" required />
          </div>
          <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
            <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Sujet</label>
            <input name="sujet" type="text" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" required />
          </div>
        </div>
        <div>
          <div class="w-full flex flex-col mt-8">
            <label class="text-base font-semibold leading-none text-gray-800 dark:text-white">Message</label>
            <textarea name="message" aria-label="leave a message" role="textbox" class="h-36 text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100 resize-none" required></textarea>
          </div>
        </div>
        <p class="text-xs leading-3 text-gray-600 dark:text-gray-200 mt-4">By clicking submit you agree to our terms of service, privacy policy and how we use data as stated</p>
        <div class="flex items-center justify-center w-full">
          <button type="submit" class="mt-9 text-base font-semibold leading-none text-white py-4 px-10 bg-indigo-700 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none">Envoyer</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ******************************************************* -->
  <!-- Begin jQuery -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- End jQuery -->

  <!-- BEGIN parsley js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
  <!-- END parsley js-->

  <?php
}


add_action('admin_post_mon_plugin_submit_form', 'mon_plugin_handle_form_submission');
function mon_plugin_handle_form_submission()
{
  global $wpdb;

  $nom = sanitize_text_field($_POST['first_name']) . ' ' . sanitize_text_field($_POST['last_name']);
  $email = sanitize_email($_POST['email']);
  $sujet = sanitize_text_field($_POST['sujet']);
  $message = sanitize_textarea_field($_POST['message']);
  $date = current_time('mysql');

  // Validation using regular expressions
  if (!preg_match('/^[a-zA-Z\s]+$/', $nom) && !preg_match('/^[a-zA-Z\s]+$/', $sujet) && !preg_match('/^[a-zA-Z\s]+$/', $message)) {
  }

  $table_name = $wpdb->prefix . 'mon_plugin_messages';

  $wpdb->insert(
    $table_name,
    array(
      'nom' => $nom,
      'email' => $email,
      'sujet' => $sujet,
      'message' => $message,
      'date' => $date,
    )
  );

  wp_redirect(admin_url('admin.php?page=mon-plugin&message=sent'));
  exit;
}

// Display message after form submission
add_action('admin_notices', 'mon_plugin_display_message');
function mon_plugin_display_message()
{
  if (isset($_GET['message']) && $_GET['message'] == 'sent') {
  ?>
    <div class="notice notice-success is-dismissible">
      <p><?php _e('Message sent successfully!', 'mon-plugin'); ?></p>
    </div>
<?php
  }
}
// ********************************************************************
function mon_plugin_dashboard_widget()
{
  global $wpdb;

  $table_name = $wpdb->prefix . 'mon_plugin_messages';
  $results = $wpdb->get_results("SELECT * FROM $table_name");

  if (!empty($results)) {
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr>';
    echo '<th>' . __('ID', 'mon-plugin') . '</th>';
    echo '<th>' . __('Name', 'mon-plugin') . '</th>';
    echo '<th>' . __('Email', 'mon-plugin') . '</th>';
    echo '<th>' . __('Subject', 'mon-plugin') . '</th>';
    echo '<th>' . __('Message', 'mon-plugin') . '</th>';
    echo '<th>' . __('Date', 'mon-plugin') . '</th>';
    echo '</tr></thead><tbody>';

    foreach ($results as $row) {
      echo '<tr>';
      echo '<td>' . $row->id . '</td>';
      echo '<td>' . $row->nom . '</td>';
      echo '<td>' . $row->email . '</td>';
      echo '<td>' . $row->sujet . '</td>';
      echo '<td>' . $row->message . '</td>';
      echo '<td>' . $row->date . '</td>';
      echo '</tr>';
    }

    echo '</tbody></table>';
  } else {
    echo '<p>' . __('No messages found.', 'mon-plugin') . '</p>';
  }
}

function mon_plugin_menu()
{
  add_menu_page('Moumou plugin', 'Moumou plugin', 'manage_options', 'mon-plugin', 'mon_plugin_page', 'dashicons-admin-plugins');

  add_action('wp_dashboard_setup', 'mon_plugin_add_dashboard_widget');
}

function mon_plugin_add_dashboard_widget()
{
  wp_add_dashboard_widget('mon_plugin_dashboard_widget', 'Moumou Plugin Contact', 'mon_plugin_dashboard_widget');
}

// Créer la table du plugin dans l'activation
register_activation_hook(__FILE__, 'mon_plugin_activation');
function mon_plugin_activation()
{
  global $wpdb;

  $table_name = $wpdb->prefix . 'mon_plugin_messages';
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		nom varchar(255) NOT NULL,
		email varchar(255) NOT NULL,
		sujet varchar(255) NOT NULL,
		message text NOT NULL,
		date datetime NOT NULL,
		PRIMARY KEY (id)
	) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
}
//function pour supprimer la table du plugin 
register_deactivation_hook(__FILE__, 'mon_plugin_deactivation');
function mon_plugin_deactivation()
{
  global $wpdb;

  $table_name = $wpdb->prefix . 'mon_plugin_messages';

  $wpdb->query("DROP TABLE IF EXISTS $table_name");
}
