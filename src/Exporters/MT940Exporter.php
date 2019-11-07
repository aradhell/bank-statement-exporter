<?php

namespace BSExporter\Exporters;

use BSExporter\Inputs\InputInterface;
use BSExporter\Inputs\MT940\MT940Input;

class MT940Exporter implements ExporterInterface
{
    /**
     * @param MT940Input $input
     * @return string
     */
    public function export(InputInterface $input): string
    {
        $result = ':20:' . $input->getHeader()->getTransactionReferenceNumber() . PHP_EOL;
        $result .= ':25:' . $input->getHeader()->getAccountNumber() . PHP_EOL;
        $result .= ':28C:' . $input->getHeader()->getStatementNumber() . PHP_EOL;
        $result .= ':60F:' . $input->getHeader()->getOpeningBalance() . PHP_EOL;

        foreach ($input->getTransactions() as $transaction) {
            $result .= ':61:' . $transaction . PHP_EOL;
        }

        $result .= ':62F:' . $input->getFooter()->getClosingBalance() . PHP_EOL;
        if (!empty($input->getFooter()->getClosingAvailableBalance())) {
            $result .= ':64:' . $input->getFooter()->getClosingAvailableBalance() . PHP_EOL;
        }
        if (!empty($input->getFooter()->getForwardValueBalance())) {
            $result .= ':65:' . $input->getFooter()->getForwardValueBalance() . PHP_EOL;
        }

        return $result;
    }
}