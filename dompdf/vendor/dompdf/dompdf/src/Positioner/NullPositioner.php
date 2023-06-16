<?php
/**
 * @package dompdf
 * @link    https://github.com/dompdf/dompdf
 * @license http://www.gnu.org/copyleft/lesser.php GNU Lesser General Public License
 */
namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;

/**
 * Dummy positioner
 *
 * @package dompdf
 */
class NullPositioner extends AbstractPositioner
{

    /**
     * @param AbstractFrameDecorator $frame
     */
    function position(AbstractFrameDecorator $frame): void
    {
        return;
    }
}
