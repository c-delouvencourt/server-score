<?php

/**
 * Class ServerCore
 *
 * Score your servers easily.
 *
 * @author NHClement
 */
class ServerScore
{
	/**
	 * Score your servers.
	 *
	 * @param bool|Return $percentage_return Return in percentage between 1 and 100%
	 * @param float /int $cpu_usage CPU Usage (0-100%)
	 * @param float /int $cpu_frequency CPU Frequency (Hz)
	 * @param float /int $cpu_cores CPU Cores number (Number)
	 * @param float /int $ram_usage Ram Usage (0-100%)
	 * @param float /int $ram_quantity Ram Quantity (Gb)
	 * @param float /int $hdd_usage HDD Usage (0-100%)
	 * @param float /int $bandwith_down_usage Bandwith Down Usage (0-100%)
	 * @param float /int $bandwith_up_usage Bandwith Up  Usage (0-100%)
	 * @return float /int Score between 0 and 1, 1 is the best and 0 is the worst.
	 */
	public static function getScore($percentage_return = true, $cpu_usage, $cpu_frequency, $cpu_cores, $ram_usage, $ram_quantity, $hdd_usage, $bandwith_down_usage, $bandwith_up_usage)
	{
		$u_cpu = (1 - (((500 * $cpu_cores) + $cpu_frequency + (240 * $cpu_usage)) / 40000)) * 4;
		$u_ram = ((-((32 * $ram_usage) - (25 * $ram_quantity) - 3200)) / 6400);
		$u_hdd = (1 - ($hdd_usage / 100));
		$u_bandwith_down = (1 - ($bandwith_down_usage / 100));
		$u_bandwith_up = (1 - ($bandwith_up_usage / 100));

		return ($percentage_return ? ((($u_cpu * 6) + ($u_ram * 5) + ($u_hdd * 4) + ($u_bandwith_down * 3) + ($u_bandwith_up * 2)) / 20) * 100 : ((($u_cpu * 6) + ($u_ram * 5) + ($u_hdd * 4) + ($u_bandwith_down * 3) + ($u_bandwith_up * 2)) / 20));
	}
}
