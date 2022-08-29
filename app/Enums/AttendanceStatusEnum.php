<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AttendanceStatusEnum extends Enum
{
    const CHUA_DIEM_DANH = 0;
    const DI_HOC = 1;
    const NGHI_KHONG_PHEP = 2;
    const NGHI_CO_PHEP = 3;
    const MUON = 4;
}
