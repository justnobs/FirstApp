<?php  if (! defined('BASEPATH')) {
     exit('No direct script access allowed');
 }
/**
 * CodeIgniter.
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 *
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * MySQLi Result Class.
 *
 * This class extends the parent result class: CI_DB_result
 *
 * @category	Database
 *
 * @author		EllisLab Dev Team
 *
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_mysqli_result extends CI_DB_result
{
    /**
     * Number of rows in the result set.
     *
     * @access	public
     *
     * @return integer
     */
    public function num_rows()
    {
        return @mysqli_num_rows($this->result_id);
    }

    // --------------------------------------------------------------------

    /**
     * Number of fields in the result set.
     *
     * @access	public
     *
     * @return integer
     */
    public function num_fields()
    {
        return @mysqli_num_fields($this->result_id);
    }

    // --------------------------------------------------------------------

    /**
     * Fetch Field Names.
     *
     * Generates an array of column names
     *
     * @access	public
     *
     * @return array
     */
    public function list_fields()
    {
        $field_names = array();
        while ($field = mysqli_fetch_field($this->result_id)) {
            $field_names[] = $field->name;
        }

        return $field_names;
    }

    // --------------------------------------------------------------------

    /**
     * Field data.
     *
     * Generates an array of objects containing field meta-data
     *
     * @access	public
     *
     * @return array
     */
    public function field_data()
    {
        $retval = array();
        while ($field = mysqli_fetch_object($this->result_id)) {
            preg_match('/([a-zA-Z]+)(\(\d+\))?/', $field->Type, $matches);

            $type = (array_key_exists(1, $matches)) ? $matches[1] : null;
            $length = (array_key_exists(2, $matches)) ? preg_replace('/[^\d]/', '', $matches[2]) : null;

            $F                = new stdClass();
            $F->name        = $field->Field;
            $F->type        = $type;
            $F->default        = $field->Default;
            $F->max_length    = $length;
            $F->primary_key = ($field->Key == 'PRI' ? 1 : 0);

            $retval[] = $F;
        }

        return $retval;
    }

    // --------------------------------------------------------------------

    /**
     * Free the result.
     */
    public function free_result()
    {
        if (is_object($this->result_id)) {
            mysqli_free_result($this->result_id);
            $this->result_id = false;
        }
    }

    // --------------------------------------------------------------------

    /**
     * Data Seek.
     *
     * Moves the internal pointer to the desired offset.  We call
     * this internally before fetching results to make sure the
     * result set starts at zero
     *
     * @access	private
     *
     * @return array
     */
    public function _data_seek($n = 0)
    {
        return mysqli_data_seek($this->result_id, $n);
    }

    // --------------------------------------------------------------------

    /**
     * Result - associative array.
     *
     * Returns the result set as an array
     *
     * @access	private
     *
     * @return array
     */
    public function _fetch_assoc()
    {
        return mysqli_fetch_assoc($this->result_id);
    }

    // --------------------------------------------------------------------

    /**
     * Result - object.
     *
     * Returns the result set as an object
     *
     * @access	private
     *
     * @return object
     */
    public function _fetch_object()
    {
        return mysqli_fetch_object($this->result_id);
    }
}

/* End of file mysqli_result.php */
/* Location: ./system/database/drivers/mysqli/mysqli_result.php */
