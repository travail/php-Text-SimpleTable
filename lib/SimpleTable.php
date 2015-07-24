<?php

namespace Text;

class SimpleTable
{
    /**
     * @var string The version of this package
     */
    const VERSION = '0.1.1';

    const DEFAULT_ENCODING = 'UTF-8';

    const TOP_LEFT      = '.-';
    const TOP_BORDER    = '-';
    const TOP_SEPARATOR = '-+-';
    const TOP_RIGHT     = '-.';

    const MIDDLE_LEFT      = '+-';
    const MIDDLE_BORDER    = '-';
    const MIDDLE_SEPARATOR = '-+-';
    const MIDDLE_RIGHT     = '-+';

    const LEFT_BORDER  = '| ';
    const SEPARATOR    = ' | ';
    const RIGHT_BORDER = ' |';

    const BOTTOM_LEFT      = "'-";
    const BOTTOM_SEPARATOR = '-+-';
    const BOTTOM_BORDER    = '-';
    const BOTTOM_RIGHT     = "-'";

    const WRAP = '-';

    /**
     * @var array
     */
    protected $columns = array();

    /**
     * @var string
     */
    protected $encoding = self::DEFAULT_ENCODING;

    /**
     * Create a new instance of \Text\SimpleTable
     *
     * @param mixed
     */
    function __construct()
    {
        $args = func_get_args();
        $cache = array();
        $max   = 0;
        foreach ($args as $arg) {
            $width = 0;
            $name  = null;
            if (is_array($arg)) {
                $width = array_shift($arg);
                $name  = array_shift($arg);
            }
            else {
                $width = $arg;
            }

            // Fix size
            if ($width < 2) $width = 2;

            // Wrap
            $title = $name ? $this->wrap($name, $width) : array();

            // Column
            $col = array($width, array(), $title);
            if ($max < count($col[2])) $max = count($col[2]);
            array_push($cache, $col);
        }

        // Padding
        foreach ($cache as $col) {
            while ($col[2] < $max) {
                array_push($col[2], '');
            }
        }

        $this->columns = $cache;
    }

    /**
     * Set encoding
     *
     * @param string $encoding Internal character encoding
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }

    /**
     * Get encoding
     *
     * @return string Internal character encoding
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Draw ASCII table
     *
     * @return string $output ASCII table
     */
    public function draw()
    {
        $rows    = count($this->columns[0][1]) - 1;
        $columns = count($this->columns) - 1;
        $output  = '';

        // Top border
        for ($j = 0; $j < $columns + 1; $j++) {
            $column = $this->columns[$j];
            $width  = $column[0];
            $text   = str_repeat(self::TOP_BORDER, $width);

            if (($j === 0) && ($columns === 0)) {
                $text = self::TOP_LEFT . self::TOP_RIGHT;
            }
            elseif ($j === 0) {
                $text = self::TOP_LEFT . $text . self::TOP_SEPARATOR;
            }
            elseif ($j === $columns) {
                $text = $text . self::TOP_RIGHT;
            }
            else {
                $text = $text . self::TOP_SEPARATOR;
            }

            $output .= $text;
        }
        $output .= "\n";

        $title = 0;
        foreach ($this->columns as $column) {
            if ($title < count($column[0])) $title = count($column[2]);
        }

        if ($title) {
            foreach (range(0, $title - 1) as $i) {
                foreach (range(0, $columns) as $j) {
                    $column = $this->columns[$j];
                    $width  = $column[0];
                    $text   = isset($column[2][$i]) ? $column[2][$i] : '';
                    $text   = sprintf("%s%s", $text, str_repeat(' ', $width - mb_strwidth($text, $this->encoding)));

                    if (($j === 0) && ($columns === 0)) {
                        $text = self::LEFT_BORDER . $text . self::RIGHT_BORDER;
                    }
                    elseif ($j === 0) {
                        $text = self::LEFT_BORDER . $text . self::SEPARATOR;
                    }
                    elseif ($j === $columns) {
                        $text = $text . self::RIGHT_BORDER;
                    }
                    else {
                        $text = $text . self::SEPARATOR;
                    }

                    $output .= $text;
                }

                $output .= "\n";
            }

            // Title separator
            $output .= $this->draw_hr();
        }

        // Rows
        foreach (range(0, $rows) as $i) {

            // Check for hr
            foreach (range(0, $columns) as $tmp) {
                if (is_null($this->columns[$tmp][1][$i])) {
                    $output .= $this->draw_hr();
                    continue 2;
                }
            }

            foreach (range(0, $columns) as $j) {
                $column = $this->columns[$j];
                $width  = $column[0];
                $text   = isset($column[1][$i]) ? $column[1][$i] : '';
                $text   = sprintf("%s%s", $text, str_repeat(' ', $width - mb_strwidth($text, $this->encoding)));

                if (($j === 0) && ($columns === 0)) {
                    $text = self::LEFT_BORDER . $text . self::RIGHT_BORDER;
                }
                elseif ($j === 0) {
                    $text = self::LEFT_BORDER . $text . self::SEPARATOR;
                }
                elseif ($j === $columns) {
                    $text = $text . self::RIGHT_BORDER;
                }
                else {
                    $text = $text . self::SEPARATOR;
                }

                $output .= $text;
            }

            $output .= "\n";
        }

        // Bottom border
        foreach (range(0, $columns) as $j) {
            $column = $this->columns[$j];
            $width  = $column[0];
            $text   = str_repeat(self::BOTTOM_BORDER, $width);

            if (($j === 0) && ($columns === 0)) {
                $text = self::BOTTOM_LEFT . $text . self::BOTTOM_RIGHT;
            }
            elseif ($j === 0) {
                $text = self::BOTTOM_LEFT . $text . self::BOTTOM_SEPARATOR;
            }
            elseif ($j === $columns) {
                $text = $text . self::BOTTOM_RIGHT;
            }
            else {
                $text = self::BOTTOM_SEPARATOR;
            }

            $output .= $text;
        }

        $output .= "\n";

        return $output;
    }

    /**
     * Draw an hr
     *
     * @return void
     */
    public function hr()
    {
        foreach (range(0, count($this->columns) - 1) as $i) {
            array_push($this->columns[$i][1], null);
        }
    }

    /**
     * Draw a row
     *
     * @return void
     */
    public function row()
    {
        $texts = func_get_args();
        $size  = count($this->columns) - 1;

        // Shortcut
        if ($size < 0) return $this;

        for ($i = 0; $i < count($size) + 1; $i++) {
            if ($size <= count($texts)) break;
            array_push($texts, '');
        }

        $cache = array();
        $max   = 0;

        foreach (range(0, $size) as $i) {
            $text   = array_shift($texts);
            $column = $this->columns[$i];
            $width  = $column[0];
            $pieces = $this->wrap($text, $width);

            array_push($cache, $pieces);
            if (count($pieces) > $max) $max = count($pieces);
        }

        foreach (range(0, count($cache) -1) as $i) {
            while (count($cache[$i]) < $max) {
                array_push($cache[$i], '');
            }
        }

        foreach (range(0, $size) as $i) {
            foreach ($cache[$i] as $str) {
                $this->columns[$i][1][] = $str;
            }
        }
    }

    protected function draw_hr()
    {
        $columns = count($this->columns) - 1;
        $output  = '';

        foreach (range(0, $columns) as $j) {
            $column = $this->columns[$j];
            $width  = $column[0];
            $text   = str_repeat(self::MIDDLE_BORDER, $width);

            if (($j === 0) && ($columns === 0)) {
                $text = self::MIDDLE_LEFT . $text . self::MIDDLE_RIGHT;
            }
            elseif ($j === 0) {
                $text = self::MIDDLE_LEFT . $text . self::MIDDLE_SEPARATOR;
            }
            elseif ($j === $columns) {
                $text = $text . self::MIDDLE_RIGHT;
            }
            else {
                $text = $text .  self::MIDDLE_SEPARATOR;
            }

            $output .= $text;
        }

        $output .= "\n";

        return $output;
    }

    protected function wrap($text, $width)
    {
        if (is_array($text)) $text = array_shift($text);
        $cache = array();
        $parts = explode("\n", $text);

        foreach ($parts as $part) {
            while (strlen($part) > $width) {
                $subtext = substr($part, 0, $width - strlen(self::WRAP));
                $part    = substr($part, $width - strlen(self::WRAP));
                array_push($cache, $subtext . self::WRAP);
            }

            if (isset($part)) array_push($cache, $part);
        }

        return $cache;
    }
}
