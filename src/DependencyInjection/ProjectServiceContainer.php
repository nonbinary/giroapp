<?php

namespace byrokrat\giroapp\DependencyInjection;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ProjectServiceContainer extends Container
{
    private $parameters;
    private $targetDirs = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->methodMap = [
            'Symfony\\Component\\Console\\Application' => 'getApplicationService',
            'byrokrat\\giroapp\\Db\\DonorQueryInterface' => 'getDonorQueryInterfaceService',
            'ini' => 'getIniService',
        ];

        $this->aliases = [];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return [
            'Psr\\Container\\ContainerInterface' => true,
            'Psr\\Log\\LoggerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'Symfony\\Component\\EventDispatcher\\EventDispatcherInterface' => true,
            'Symfony\\Component\\Filesystem\\Filesystem' => true,
            'base_dir_reader' => true,
            'base_dir_repository' => true,
            'byrokrat\\autogiro\\Parser\\ParserFactory' => true,
            'byrokrat\\autogiro\\Parser\\ParserInterface' => true,
            'byrokrat\\autogiro\\Writer\\WriterFactory' => true,
            'byrokrat\\autogiro\\Writer\\WriterInterface' => true,
            'byrokrat\\banking\\AccountFactoryInterface' => true,
            'byrokrat\\banking\\BankgiroFactory' => true,
            'byrokrat\\giroapp\\AutogiroVisitor' => true,
            'byrokrat\\giroapp\\AutogiroWriterFactory' => true,
            'byrokrat\\giroapp\\Config\\ArrayRepository' => true,
            'byrokrat\\giroapp\\Config\\BaseDirReader' => true,
            'byrokrat\\giroapp\\Config\\ConfigManager' => true,
            'byrokrat\\giroapp\\Config\\IniFileLoader' => true,
            'byrokrat\\giroapp\\Config\\IniRepository' => true,
            'byrokrat\\giroapp\\Config\\LazyConfig' => true,
            'byrokrat\\giroapp\\Config\\SimpleConfig' => true,
            'byrokrat\\giroapp\\Console\\Adapter' => true,
            'byrokrat\\giroapp\\Console\\AddCommand' => true,
            'byrokrat\\giroapp\\Console\\EditCommand' => true,
            'byrokrat\\giroapp\\Console\\ExportCommand' => true,
            'byrokrat\\giroapp\\Console\\Helper\\InputReader' => true,
            'byrokrat\\giroapp\\Console\\Helper\\QuestionFactory' => true,
            'byrokrat\\giroapp\\Console\\ImportCommand' => true,
            'byrokrat\\giroapp\\Console\\LsCommand' => true,
            'byrokrat\\giroapp\\Console\\PauseCommand' => true,
            'byrokrat\\giroapp\\Console\\PurgeCommand' => true,
            'byrokrat\\giroapp\\Console\\RemoveCommand' => true,
            'byrokrat\\giroapp\\Console\\RevokeCommand' => true,
            'byrokrat\\giroapp\\Console\\ShowCommand' => true,
            'byrokrat\\giroapp\\Console\\StatusCommand' => true,
            'byrokrat\\giroapp\\Db\\DonorQueryDecorator' => true,
            'byrokrat\\giroapp\\Db\\DonorRepositoryInterface' => true,
            'byrokrat\\giroapp\\Db\\DriverEnvironment' => true,
            'byrokrat\\giroapp\\Db\\DriverFactoryCollection' => true,
            'byrokrat\\giroapp\\Db\\DriverFactoryInterface' => true,
            'byrokrat\\giroapp\\Db\\DriverInterface' => true,
            'byrokrat\\giroapp\\Db\\ImportHistoryInterface' => true,
            'byrokrat\\giroapp\\Db\\Json\\JsonDonorRepository' => true,
            'byrokrat\\giroapp\\Db\\Json\\JsonDriver' => true,
            'byrokrat\\giroapp\\Db\\Json\\JsonDriverFactory' => true,
            'byrokrat\\giroapp\\Db\\Json\\JsonImportHistory' => true,
            'byrokrat\\giroapp\\DependencyInjection\\ProjectServiceContainer' => true,
            'byrokrat\\giroapp\\Event\\DonorEvent' => true,
            'byrokrat\\giroapp\\Event\\FileEvent' => true,
            'byrokrat\\giroapp\\Event\\LogEvent' => true,
            'byrokrat\\giroapp\\Event\\NodeEvent' => true,
            'byrokrat\\giroapp\\Event\\XmlEvent' => true,
            'byrokrat\\giroapp\\Exception\\DonorAlreadyExistsException' => true,
            'byrokrat\\giroapp\\Exception\\DonorDoesNotExistException' => true,
            'byrokrat\\giroapp\\Exception\\FileAlreadyImportedException' => true,
            'byrokrat\\giroapp\\Exception\\InvalidAutogiroFileException' => true,
            'byrokrat\\giroapp\\Exception\\InvalidConfigException' => true,
            'byrokrat\\giroapp\\Exception\\InvalidDataException' => true,
            'byrokrat\\giroapp\\Exception\\InvalidPluginException' => true,
            'byrokrat\\giroapp\\Exception\\InvalidStateTransitionException' => true,
            'byrokrat\\giroapp\\Exception\\InvalidXmlException' => true,
            'byrokrat\\giroapp\\Exception\\InvalidXmlFormException' => true,
            'byrokrat\\giroapp\\Exception\\UnableToBuildDonorException' => true,
            'byrokrat\\giroapp\\Exception\\UnableToReadFileException' => true,
            'byrokrat\\giroapp\\Exception\\UnknownIdentifierException' => true,
            'byrokrat\\giroapp\\Exception\\UnsupportedVersionException' => true,
            'byrokrat\\giroapp\\Exception\\ValidatorException' => true,
            'byrokrat\\giroapp\\Filesystem\\FilesystemConfigurator' => true,
            'byrokrat\\giroapp\\Filesystem\\FilesystemFactory' => true,
            'byrokrat\\giroapp\\Filesystem\\HashedFile' => true,
            'byrokrat\\giroapp\\Filesystem\\NullFilesystem' => true,
            'byrokrat\\giroapp\\Filesystem\\NullProcessor' => true,
            'byrokrat\\giroapp\\Filesystem\\RenamingProcessor' => true,
            'byrokrat\\giroapp\\Filesystem\\Sha256File' => true,
            'byrokrat\\giroapp\\Filesystem\\StdFilesystem' => true,
            'byrokrat\\giroapp\\Filter\\ActiveFilter' => true,
            'byrokrat\\giroapp\\Filter\\AwaitingResponseFilter' => true,
            'byrokrat\\giroapp\\Filter\\CombinedFilter' => true,
            'byrokrat\\giroapp\\Filter\\ErrorFilter' => true,
            'byrokrat\\giroapp\\Filter\\ExportableFilter' => true,
            'byrokrat\\giroapp\\Filter\\FilterCollection' => true,
            'byrokrat\\giroapp\\Filter\\InactiveFilter' => true,
            'byrokrat\\giroapp\\Filter\\NegatedFilter' => true,
            'byrokrat\\giroapp\\Filter\\PausedFilter' => true,
            'byrokrat\\giroapp\\Filter\\PurgeableFilter' => true,
            'byrokrat\\giroapp\\Formatter\\CsvFormatter' => true,
            'byrokrat\\giroapp\\Formatter\\FormatterCollection' => true,
            'byrokrat\\giroapp\\Formatter\\HumanFormatter' => true,
            'byrokrat\\giroapp\\Formatter\\JsonFormatter' => true,
            'byrokrat\\giroapp\\Formatter\\ListFormatter' => true,
            'byrokrat\\giroapp\\Listener\\AutogiroImportingListener' => true,
            'byrokrat\\giroapp\\Listener\\CommittingListener' => true,
            'byrokrat\\giroapp\\Listener\\DonorPersistingListener' => true,
            'byrokrat\\giroapp\\Listener\\FileImportingListener' => true,
            'byrokrat\\giroapp\\Listener\\ImportHistoryListener' => true,
            'byrokrat\\giroapp\\Listener\\LoggingListener' => true,
            'byrokrat\\giroapp\\Listener\\MandateResponseListener' => true,
            'byrokrat\\giroapp\\Listener\\MonitoringListener' => true,
            'byrokrat\\giroapp\\Listener\\XmlImportingListener' => true,
            'byrokrat\\giroapp\\Model\\Builder\\DonorBuilder' => true,
            'byrokrat\\giroapp\\Model\\Builder\\MandateKeyFactory' => true,
            'byrokrat\\giroapp\\Model\\Donor' => true,
            'byrokrat\\giroapp\\Model\\DonorCollection' => true,
            'byrokrat\\giroapp\\Model\\DonorFactory' => true,
            'byrokrat\\giroapp\\Model\\FileThatWasImported' => true,
            'byrokrat\\giroapp\\Model\\NewDonor' => true,
            'byrokrat\\giroapp\\Model\\NewDonorProcessor' => true,
            'byrokrat\\giroapp\\Model\\PostalAddress' => true,
            'byrokrat\\giroapp\\Plugin\\ApiVersion' => true,
            'byrokrat\\giroapp\\Plugin\\ApiVersionConstraint' => true,
            'byrokrat\\giroapp\\Plugin\\ConfiguringEnvironment' => true,
            'byrokrat\\giroapp\\Plugin\\CorePlugin' => true,
            'byrokrat\\giroapp\\Plugin\\EnvironmentInterface' => true,
            'byrokrat\\giroapp\\Plugin\\FilesystemLoadingPlugin' => true,
            'byrokrat\\giroapp\\Plugin\\Plugin' => true,
            'byrokrat\\giroapp\\Plugin\\PluginCollection' => true,
            'byrokrat\\giroapp\\Sorter\\AmountSorter' => true,
            'byrokrat\\giroapp\\Sorter\\CreatedSorter' => true,
            'byrokrat\\giroapp\\Sorter\\DescendingSorter' => true,
            'byrokrat\\giroapp\\Sorter\\NameSorter' => true,
            'byrokrat\\giroapp\\Sorter\\NullSorter' => true,
            'byrokrat\\giroapp\\Sorter\\PayerNumberSorter' => true,
            'byrokrat\\giroapp\\Sorter\\SorterCollection' => true,
            'byrokrat\\giroapp\\Sorter\\StateSorter' => true,
            'byrokrat\\giroapp\\Sorter\\UpdatedSorter' => true,
            'byrokrat\\giroapp\\State\\ActiveState' => true,
            'byrokrat\\giroapp\\State\\ErrorState' => true,
            'byrokrat\\giroapp\\State\\InactiveState' => true,
            'byrokrat\\giroapp\\State\\MandateApprovedState' => true,
            'byrokrat\\giroapp\\State\\MandateSentState' => true,
            'byrokrat\\giroapp\\State\\NewDigitalMandateState' => true,
            'byrokrat\\giroapp\\State\\NewMandateState' => true,
            'byrokrat\\giroapp\\State\\PauseMandateState' => true,
            'byrokrat\\giroapp\\State\\PauseSentState' => true,
            'byrokrat\\giroapp\\State\\PausedState' => true,
            'byrokrat\\giroapp\\State\\RevocationSentState' => true,
            'byrokrat\\giroapp\\State\\RevokeMandateState' => true,
            'byrokrat\\giroapp\\State\\StateCollection' => true,
            'byrokrat\\giroapp\\State\\TransactionDateFactory' => true,
            'byrokrat\\giroapp\\Utils\\LogFormatter' => true,
            'byrokrat\\giroapp\\Utils\\SystemClock' => true,
            'byrokrat\\giroapp\\Validator\\AccountValidator' => true,
            'byrokrat\\giroapp\\Validator\\BgcNumberValidator' => true,
            'byrokrat\\giroapp\\Validator\\CallbackValidator' => true,
            'byrokrat\\giroapp\\Validator\\ChoiceValidator' => true,
            'byrokrat\\giroapp\\Validator\\DonorKeyValidator' => true,
            'byrokrat\\giroapp\\Validator\\EmailValidator' => true,
            'byrokrat\\giroapp\\Validator\\IdValidator' => true,
            'byrokrat\\giroapp\\Validator\\NotEmptyValidator' => true,
            'byrokrat\\giroapp\\Validator\\NumericValidator' => true,
            'byrokrat\\giroapp\\Validator\\PayerNumberValidator' => true,
            'byrokrat\\giroapp\\Validator\\PhoneValidator' => true,
            'byrokrat\\giroapp\\Validator\\PostalCodeValidator' => true,
            'byrokrat\\giroapp\\Validator\\StringValidator' => true,
            'byrokrat\\giroapp\\Validator\\ValidatorCollection' => true,
            'byrokrat\\giroapp\\Xml\\XmlFormTranslator' => true,
            'byrokrat\\giroapp\\Xml\\XmlMandateParser' => true,
            'byrokrat\\giroapp\\Xml\\XmlObject' => true,
            'byrokrat\\id\\IdFactoryInterface' => true,
            'byrokrat\\id\\OrganizationIdFactory' => true,
            'file_export_cwd_dumper' => true,
            'file_export_dumper' => true,
            'file_import_dumper' => true,
            'fs_cwd' => true,
            'fs_exports' => true,
            'fs_imports' => true,
            'fs_plugins' => true,
            'organization_bg' => true,
            'organization_id' => true,
            'plugins' => true,
            'setup_mkdir' => true,
        ];
    }

    protected function createProxy($class, \Closure $factory)
    {
        class_exists($class, false) || class_alias("byrokrat\giroapp\DependencyInjection\\{$class}", $class, false);

        return $factory();
    }

    /**
     * Gets the public 'Symfony\Component\Console\Application' shared autowired service.
     *
     * @return \Symfony\Component\Console\Application
     */
    protected function getApplicationService()
    {
        $a = new \byrokrat\giroapp\Plugin\ApiVersion();

        $this->services['Symfony\Component\Console\Application'] = $instance = new \Symfony\Component\Console\Application('GiroApp', $a);

        $b = ($this->privates['Symfony\Component\EventDispatcher\EventDispatcherInterface'] ?? $this->getEventDispatcherInterfaceService());
        $c = new \byrokrat\giroapp\Filter\FilterCollection();
        $d = new \byrokrat\giroapp\Formatter\FormatterCollection();
        $e = new \byrokrat\giroapp\Sorter\SorterCollection();
        $f = ($this->privates['byrokrat\giroapp\State\StateCollection'] ?? ($this->privates['byrokrat\giroapp\State\StateCollection'] = new \byrokrat\giroapp\State\StateCollection()));

        $g = new \byrokrat\giroapp\Plugin\ConfiguringEnvironment($a, ($this->privates['byrokrat\giroapp\Db\DriverFactoryCollection'] ?? ($this->privates['byrokrat\giroapp\Db\DriverFactoryCollection'] = new \byrokrat\giroapp\Db\DriverFactoryCollection())), $b, $c, $d, $e, $f, ($this->services['ini'] ?? $this->getIniService()), ($this->privates['byrokrat\giroapp\Xml\XmlFormTranslator'] ?? ($this->privates['byrokrat\giroapp\Xml\XmlFormTranslator'] = new \byrokrat\giroapp\Xml\XmlFormTranslator())));

        $h = new \byrokrat\giroapp\Console\AddCommand(($this->privates['byrokrat\giroapp\Model\Builder\DonorBuilder'] ?? $this->getDonorBuilderService()));

        $i = ($this->privates['byrokrat\banking\AccountFactoryInterface'] ?? ($this->privates['byrokrat\banking\AccountFactoryInterface'] = new \byrokrat\banking\AccountFactory()));
        $j = ($this->privates['byrokrat\id\IdFactoryInterface'] ?? $this->getIdFactoryInterfaceService());

        $h->setAccountFactory($i);
        $h->setEventDispatcher($b);
        $h->setIdFactory($j);
        $k = new \byrokrat\giroapp\Console\EditCommand($f);

        $l = ($this->services['byrokrat\giroapp\Db\DonorQueryInterface'] ?? $this->getDonorQueryInterfaceService());

        $k->setAccountFactory($i);
        $k->setEventDispatcher($b);
        $k->setIdFactory($j);
        $k->setDonorQuery($l);
        $m = new \byrokrat\giroapp\Console\ExportCommand((new \byrokrat\giroapp\AutogiroWriterFactory(new \byrokrat\autogiro\Writer\WriterFactory()))->createWriter(($this->services['ini'] ?? $this->getIniService())->getConfig("org_bgc_nr"), ($this->privates['organization_bg'] ?? $this->getOrganizationBgService())), $f);
        $m->setEventDispatcher($b);
        $m->setDonorQuery($l);
        $n = new \byrokrat\giroapp\Console\ImportCommand(($this->privates['fs_cwd'] ?? $this->getFsCwdService()));
        $n->setEventDispatcher($b);
        $o = new \byrokrat\giroapp\Console\LsCommand($c, $d, $e);
        $o->setDonorQuery($l);
        $p = new \byrokrat\giroapp\Console\PauseCommand($f);
        $p->setDonorQuery($l);
        $p->setEventDispatcher($b);
        $q = new \byrokrat\giroapp\Console\PurgeCommand();
        $q->setEventDispatcher($b);
        $q->setDonorQuery($l);
        $r = new \byrokrat\giroapp\Console\RemoveCommand();
        $r->setDonorQuery($l);
        $r->setEventDispatcher($b);
        $s = new \byrokrat\giroapp\Console\RevokeCommand();
        $s->setDonorQuery($l);
        $s->setEventDispatcher($b);
        $t = new \byrokrat\giroapp\Console\ShowCommand($d);
        $t->setDonorQuery($l);
        $u = new \byrokrat\giroapp\Console\StatusCommand();
        $u->setDonorQuery($l);
        $v = new \byrokrat\giroapp\Filesystem\StdFilesystem(($this->services['ini'] ?? $this->getIniService())->getConfigValue("plugins_dir"), ($this->privates['Symfony\Component\Filesystem\Filesystem'] ?? ($this->privates['Symfony\Component\Filesystem\Filesystem'] = new \Symfony\Component\Filesystem\Filesystem())));
        ($this->privates['setup_mkdir'] ?? ($this->privates['setup_mkdir'] = new \byrokrat\giroapp\Filesystem\FilesystemConfigurator([0 => '.'])))->createFiles($v);

        (new \byrokrat\giroapp\Plugin\PluginCollection(new \byrokrat\giroapp\Plugin\CorePlugin($h, $k, $m, $n, $o, $p, $q, $r, $s, $t, $u, new \byrokrat\giroapp\Db\Json\JsonDriverFactory(), new \byrokrat\giroapp\Filter\ActiveFilter(), new \byrokrat\giroapp\Filter\InactiveFilter(), new \byrokrat\giroapp\Filter\ExportableFilter(), new \byrokrat\giroapp\Filter\ErrorFilter(), new \byrokrat\giroapp\Filter\PausedFilter(), new \byrokrat\giroapp\Filter\PurgeableFilter(), new \byrokrat\giroapp\Filter\AwaitingResponseFilter(), new \byrokrat\giroapp\Formatter\ListFormatter(), new \byrokrat\giroapp\Formatter\CsvFormatter(), new \byrokrat\giroapp\Formatter\HumanFormatter(), new \byrokrat\giroapp\Formatter\JsonFormatter(), new \byrokrat\giroapp\Sorter\NullSorter(), new \byrokrat\giroapp\Sorter\NameSorter(), new \byrokrat\giroapp\Sorter\StateSorter(), new \byrokrat\giroapp\Sorter\PayerNumberSorter(), new \byrokrat\giroapp\Sorter\AmountSorter(), new \byrokrat\giroapp\Sorter\CreatedSorter(), new \byrokrat\giroapp\Sorter\UpdatedSorter(), new \byrokrat\giroapp\State\ActiveState(), new \byrokrat\giroapp\State\ErrorState(), new \byrokrat\giroapp\State\InactiveState(), new \byrokrat\giroapp\State\NewMandateState(), new \byrokrat\giroapp\State\NewDigitalMandateState(), new \byrokrat\giroapp\State\MandateSentState(), new \byrokrat\giroapp\State\MandateApprovedState(new \byrokrat\giroapp\State\TransactionDateFactory(($this->privates['byrokrat\giroapp\Utils\SystemClock'] ?? ($this->privates['byrokrat\giroapp\Utils\SystemClock'] = new \byrokrat\giroapp\Utils\SystemClock())), ($this->services['ini'] ?? $this->getIniService())->getConfig("trans_day_of_month"), ($this->services['ini'] ?? $this->getIniService())->getConfig("trans_min_days_in_future"))), new \byrokrat\giroapp\State\RevokeMandateState(), new \byrokrat\giroapp\State\RevocationSentState(), new \byrokrat\giroapp\State\PauseMandateState(), new \byrokrat\giroapp\State\PauseSentState(), new \byrokrat\giroapp\State\PausedState()), new \byrokrat\giroapp\Plugin\FilesystemLoadingPlugin($v)))->loadPlugin($g);

        $g->configureApplication($instance);

        return $instance;
    }

    /**
     * Gets the public 'byrokrat\giroapp\Db\DonorQueryInterface' shared autowired service.
     *
     * @return \byrokrat\giroapp\Db\DonorQueryDecorator
     */
    protected function getDonorQueryInterfaceService($lazyLoad = true)
    {
        if ($lazyLoad) {
            return $this->services['byrokrat\\giroapp\\Db\\DonorQueryInterface'] = $this->createProxy('DonorQueryDecorator_48491f1', function () {
                return \DonorQueryDecorator_48491f1::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
                    $wrappedInstance = $this->getDonorQueryInterfaceService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        return new \byrokrat\giroapp\Db\DonorQueryDecorator(($this->privates['byrokrat\giroapp\Db\DonorRepositoryInterface'] ?? $this->getDonorRepositoryInterfaceService()));
    }

    /**
     * Gets the public 'ini' shared autowired service.
     *
     * @return \byrokrat\giroapp\Config\ConfigManager
     */
    protected function getIniService()
    {
        $this->services['ini'] = $instance = new \byrokrat\giroapp\Config\ConfigManager(new \byrokrat\giroapp\Config\ArrayRepository(['base_dir' => (new \byrokrat\giroapp\Config\BaseDirReader($this->getEnv('GIROAPP_INI')))->getBaseDir()]));

        (new \byrokrat\giroapp\Config\IniFileLoader($this->getEnv('GIROAPP_INI'), ($this->privates['fs_cwd'] ?? $this->getFsCwdService())))->loadIniFile($instance);

        return $instance;
    }

    /**
     * Gets the private 'Symfony\Component\EventDispatcher\EventDispatcherInterface' shared autowired service.
     *
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected function getEventDispatcherInterfaceService()
    {
        $this->privates['Symfony\Component\EventDispatcher\EventDispatcherInterface'] = $instance = new \Symfony\Component\EventDispatcher\EventDispatcher();

        $instance->addListener('EXECUTION_STARTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchDebug'], 10);
        $instance->addListener('EXECUTION_STOPED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchDebug'], 10);
        $instance->addListener('FILE_IMPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('FILE_EXPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('FILE_FORCEFULLY_IMPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('DONOR_ADDED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('DONOR_UPDATED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('MANDATE_APPROVED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('MANDATE_REVOKED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('MANDATE_REVOCATION_REQUESTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('DONOR_REMOVED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('MANDATE_INVALIDATED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchWarning'], 10);
        $instance->addListener('MANDATE_PAUSE_REQUESTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('MANDATE_PAUSED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('MANDATE_RESTARTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] ?? ($this->privates['byrokrat\giroapp\Listener\MonitoringListener'] = new \byrokrat\giroapp\Listener\MonitoringListener()));
        }, 1 => 'dispatchInfo'], 10);
        $instance->addListener('ERROR', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\LoggingListener'] ?? $this->getLoggingListenerService());
        }, 1 => 'onERROR'], 10);
        $instance->addListener('WARNING', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\LoggingListener'] ?? $this->getLoggingListenerService());
        }, 1 => 'onWARNING'], 10);
        $instance->addListener('INFO', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\LoggingListener'] ?? $this->getLoggingListenerService());
        }, 1 => 'onINFO'], 10);
        $instance->addListener('DEBUG', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\LoggingListener'] ?? $this->getLoggingListenerService());
        }, 1 => 'onDEBUG'], 10);
        $instance->addListener('FILE_IMPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\ImportHistoryListener'] ?? $this->getImportHistoryListenerService());
        }, 1 => 'onFILEIMPORTED'], 10);
        $instance->addListener('FILE_IMPORTED', [0 => function () {
            return ($this->privates['file_import_dumper'] ?? $this->getFileImportDumperService());
        }, 1 => 'onFileEvent'], -10);
        $instance->addListener('FILE_FORCEFULLY_IMPORTED', [0 => function () {
            return ($this->privates['file_import_dumper'] ?? $this->getFileImportDumperService());
        }, 1 => 'onFileEvent'], -10);
        $instance->addListener('EXECUTION_STOPED', [0 => function () {
            return ($this->privates['file_import_dumper'] ?? $this->getFileImportDumperService());
        }, 1 => 'onEXECUTIONSTOPED']);
        $instance->addListener('FILE_EXPORTED', [0 => function () {
            return ($this->privates['file_export_dumper'] ?? $this->getFileExportDumperService());
        }, 1 => 'onFileEvent'], -9);
        $instance->addListener('EXECUTION_STOPED', [0 => function () {
            return ($this->privates['file_export_dumper'] ?? $this->getFileExportDumperService());
        }, 1 => 'onEXECUTIONSTOPED']);
        $instance->addListener('FILE_EXPORTED', [0 => function () {
            return ($this->privates['file_export_cwd_dumper'] ?? $this->getFileExportCwdDumperService());
        }, 1 => 'onFileEvent'], -10);
        $instance->addListener('FILE_IMPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\FileImportingListener'] ?? ($this->privates['byrokrat\giroapp\Listener\FileImportingListener'] = new \byrokrat\giroapp\Listener\FileImportingListener()));
        }, 1 => 'onFILEIMPORTED']);
        $instance->addListener('FILE_FORCEFULLY_IMPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\FileImportingListener'] ?? ($this->privates['byrokrat\giroapp\Listener\FileImportingListener'] = new \byrokrat\giroapp\Listener\FileImportingListener()));
        }, 1 => 'onFileImported']);
        $instance->addListener('AUTOGIRO_FILE_IMPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\AutogiroImportingListener'] ?? $this->getAutogiroImportingListenerService());
        }, 1 => 'onAUTOGIROFILEIMPORTED']);
        $instance->addListener('XML_FILE_IMPORTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\XmlImportingListener'] ?? $this->getXmlImportingListenerService());
        }, 1 => 'onXMLFILEIMPORTED']);
        $instance->addListener('EXECUTION_STOPED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\CommittingListener'] ?? $this->getCommittingListenerService());
        }, 1 => 'onEXECUTIONSTOPED']);
        $instance->addListener('MANDATE_RESPONSE_RECEIVED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\MandateResponseListener'] ?? $this->getMandateResponseListenerService());
        }, 1 => 'onMANDATERESPONSERECEIVED']);
        $instance->addListener('DONOR_ADDED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDONORADDED']);
        $instance->addListener('DONOR_REMOVED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDONORREMOVED']);
        $instance->addListener('DONOR_UPDATED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);
        $instance->addListener('MANDATE_APPROVED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);
        $instance->addListener('MANDATE_REVOKED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);
        $instance->addListener('MANDATE_REVOCATION_REQUESTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);
        $instance->addListener('MANDATE_INVALIDATED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);
        $instance->addListener('MANDATE_PAUSE_REQUESTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);
        $instance->addListener('MANDATE_PAUSED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);
        $instance->addListener('MANDATE_RESTARTED', [0 => function () {
            return ($this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] ?? $this->getDonorPersistingListenerService());
        }, 1 => 'onDonorUpdated']);

        return $instance;
    }

    /**
     * Gets the private 'byrokrat\giroapp\Db\DonorRepositoryInterface' shared autowired service.
     *
     * @return \byrokrat\giroapp\Db\DonorRepositoryInterface
     */
    protected function getDonorRepositoryInterfaceService()
    {
        return $this->privates['byrokrat\giroapp\Db\DonorRepositoryInterface'] = ($this->privates['byrokrat\giroapp\Db\DriverInterface'] ?? $this->getDriverInterfaceService())->getDonorRepository(($this->privates['byrokrat\giroapp\Db\DriverEnvironment'] ?? $this->getDriverEnvironmentService()));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Db\DriverEnvironment' shared autowired service.
     *
     * @return \byrokrat\giroapp\Db\DriverEnvironment
     */
    protected function getDriverEnvironmentService()
    {
        return $this->privates['byrokrat\giroapp\Db\DriverEnvironment'] = new \byrokrat\giroapp\Db\DriverEnvironment(($this->privates['byrokrat\giroapp\Utils\SystemClock'] ?? ($this->privates['byrokrat\giroapp\Utils\SystemClock'] = new \byrokrat\giroapp\Utils\SystemClock())), new \byrokrat\giroapp\Model\DonorFactory(($this->privates['byrokrat\giroapp\State\StateCollection'] ?? ($this->privates['byrokrat\giroapp\State\StateCollection'] = new \byrokrat\giroapp\State\StateCollection())), ($this->privates['byrokrat\banking\AccountFactoryInterface'] ?? ($this->privates['byrokrat\banking\AccountFactoryInterface'] = new \byrokrat\banking\AccountFactory())), ($this->privates['byrokrat\id\IdFactoryInterface'] ?? $this->getIdFactoryInterfaceService())));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Db\DriverInterface' shared autowired service.
     *
     * @return \byrokrat\giroapp\Db\DriverInterface
     */
    protected function getDriverInterfaceService()
    {
        return $this->privates['byrokrat\giroapp\Db\DriverInterface'] = [($this->privates['byrokrat\giroapp\Db\DriverFactoryCollection'] ?? ($this->privates['byrokrat\giroapp\Db\DriverFactoryCollection'] = new \byrokrat\giroapp\Db\DriverFactoryCollection()))->getDriverFactory(($this->services['ini'] ?? $this->getIniService())->getConfigValue("db_driver")), 'createDriver'](($this->services['ini'] ?? $this->getIniService())->getConfigValue("db_dsn"));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Filesystem\FilesystemFactory' shared autowired service.
     *
     * @return \byrokrat\giroapp\Filesystem\FilesystemFactory
     */
    protected function getFilesystemFactoryService()
    {
        return $this->privates['byrokrat\giroapp\Filesystem\FilesystemFactory'] = new \byrokrat\giroapp\Filesystem\FilesystemFactory(($this->privates['Symfony\Component\Filesystem\Filesystem'] ?? ($this->privates['Symfony\Component\Filesystem\Filesystem'] = new \Symfony\Component\Filesystem\Filesystem())));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Filesystem\RenamingProcessor' shared autowired service.
     *
     * @return \byrokrat\giroapp\Filesystem\RenamingProcessor
     */
    protected function getRenamingProcessorService()
    {
        return $this->privates['byrokrat\giroapp\Filesystem\RenamingProcessor'] = new \byrokrat\giroapp\Filesystem\RenamingProcessor(($this->privates['byrokrat\giroapp\Utils\SystemClock'] ?? ($this->privates['byrokrat\giroapp\Utils\SystemClock'] = new \byrokrat\giroapp\Utils\SystemClock())));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Listener\AutogiroImportingListener' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\AutogiroImportingListener
     */
    protected function getAutogiroImportingListenerService()
    {
        $a = new \byrokrat\giroapp\AutogiroVisitor(($this->services['ini'] ?? $this->getIniService())->getConfig("org_bgc_nr"), ($this->privates['organization_bg'] ?? $this->getOrganizationBgService()));
        $a->setEventDispatcher(($this->privates['Symfony\Component\EventDispatcher\EventDispatcherInterface'] ?? $this->getEventDispatcherInterfaceService()));

        return $this->privates['byrokrat\giroapp\Listener\AutogiroImportingListener'] = new \byrokrat\giroapp\Listener\AutogiroImportingListener((new \byrokrat\autogiro\Parser\ParserFactory())->createParser(), $a);
    }

    /**
     * Gets the private 'byrokrat\giroapp\Listener\CommittingListener' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\CommittingListener
     */
    protected function getCommittingListenerService()
    {
        return $this->privates['byrokrat\giroapp\Listener\CommittingListener'] = new \byrokrat\giroapp\Listener\CommittingListener(($this->privates['byrokrat\giroapp\Db\DriverInterface'] ?? $this->getDriverInterfaceService()));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Listener\DonorPersistingListener' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\DonorPersistingListener
     */
    protected function getDonorPersistingListenerService()
    {
        return $this->privates['byrokrat\giroapp\Listener\DonorPersistingListener'] = new \byrokrat\giroapp\Listener\DonorPersistingListener(($this->privates['byrokrat\giroapp\Db\DonorRepositoryInterface'] ?? $this->getDonorRepositoryInterfaceService()));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Listener\ImportHistoryListener' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\ImportHistoryListener
     */
    protected function getImportHistoryListenerService()
    {
        return $this->privates['byrokrat\giroapp\Listener\ImportHistoryListener'] = new \byrokrat\giroapp\Listener\ImportHistoryListener(($this->privates['byrokrat\giroapp\Db\DriverInterface'] ?? $this->getDriverInterfaceService())->getImportHistory(($this->privates['byrokrat\giroapp\Db\DriverEnvironment'] ?? $this->getDriverEnvironmentService())));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Listener\LoggingListener' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\LoggingListener
     */
    protected function getLoggingListenerService()
    {
        $a = new \Apix\Log\Logger\File(($this->services['ini'] ?? $this->getIniService())->getConfigValue("log_file"));
        $a->setMinLevel(($this->services['ini'] ?? $this->getIniService())->getConfigValue("log_level"));
        $a->setLogFormatter(new \byrokrat\giroapp\Utils\LogFormatter());

        return $this->privates['byrokrat\giroapp\Listener\LoggingListener'] = new \byrokrat\giroapp\Listener\LoggingListener($a);
    }

    /**
     * Gets the private 'byrokrat\giroapp\Listener\MandateResponseListener' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\MandateResponseListener
     */
    protected function getMandateResponseListenerService()
    {
        return $this->privates['byrokrat\giroapp\Listener\MandateResponseListener'] = new \byrokrat\giroapp\Listener\MandateResponseListener(($this->services['byrokrat\giroapp\Db\DonorQueryInterface'] ?? $this->getDonorQueryInterfaceService()), ($this->privates['byrokrat\giroapp\State\StateCollection'] ?? ($this->privates['byrokrat\giroapp\State\StateCollection'] = new \byrokrat\giroapp\State\StateCollection())));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Listener\XmlImportingListener' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\XmlImportingListener
     */
    protected function getXmlImportingListenerService()
    {
        $a = ($this->privates['byrokrat\id\IdFactoryInterface'] ?? $this->getIdFactoryInterfaceService());

        return $this->privates['byrokrat\giroapp\Listener\XmlImportingListener'] = new \byrokrat\giroapp\Listener\XmlImportingListener(new \byrokrat\giroapp\Xml\XmlMandateParser($a->createId(($this->services['ini'] ?? $this->getIniService())->getConfigValue("org_id")), ($this->privates['organization_bg'] ?? $this->getOrganizationBgService()), ($this->privates['byrokrat\giroapp\Model\Builder\DonorBuilder'] ?? $this->getDonorBuilderService()), ($this->privates['byrokrat\giroapp\Xml\XmlFormTranslator'] ?? ($this->privates['byrokrat\giroapp\Xml\XmlFormTranslator'] = new \byrokrat\giroapp\Xml\XmlFormTranslator())), ($this->privates['byrokrat\banking\AccountFactoryInterface'] ?? ($this->privates['byrokrat\banking\AccountFactoryInterface'] = new \byrokrat\banking\AccountFactory())), $a));
    }

    /**
     * Gets the private 'byrokrat\giroapp\Model\Builder\DonorBuilder' shared autowired service.
     *
     * @return \byrokrat\giroapp\Model\Builder\DonorBuilder
     */
    protected function getDonorBuilderService()
    {
        return $this->privates['byrokrat\giroapp\Model\Builder\DonorBuilder'] = new \byrokrat\giroapp\Model\Builder\DonorBuilder(new \byrokrat\giroapp\Model\Builder\MandateKeyFactory(), ($this->privates['byrokrat\giroapp\State\StateCollection'] ?? ($this->privates['byrokrat\giroapp\State\StateCollection'] = new \byrokrat\giroapp\State\StateCollection())), ($this->privates['byrokrat\giroapp\Utils\SystemClock'] ?? ($this->privates['byrokrat\giroapp\Utils\SystemClock'] = new \byrokrat\giroapp\Utils\SystemClock())));
    }

    /**
     * Gets the private 'byrokrat\id\IdFactoryInterface' shared service.
     *
     * @return \byrokrat\id\PersonalIdFactory
     */
    protected function getIdFactoryInterfaceService()
    {
        return $this->privates['byrokrat\id\IdFactoryInterface'] = new \byrokrat\id\PersonalIdFactory(new \byrokrat\id\OrganizationIdFactory());
    }

    /**
     * Gets the private 'file_export_cwd_dumper' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\FileDumpingListener
     */
    protected function getFileExportCwdDumperService()
    {
        return $this->privates['file_export_cwd_dumper'] = new \byrokrat\giroapp\Listener\FileDumpingListener(($this->privates['fs_cwd'] ?? $this->getFsCwdService()), new \byrokrat\giroapp\Filesystem\NullProcessor());
    }

    /**
     * Gets the private 'file_export_dumper' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\FileDumpingListener
     */
    protected function getFileExportDumperService()
    {
        $a = ($this->privates['byrokrat\giroapp\Filesystem\FilesystemFactory'] ?? $this->getFilesystemFactoryService())->createFilesystem(($this->services['ini'] ?? $this->getIniService())->getConfigValue("exports_dir"));
        ($this->privates['setup_mkdir'] ?? ($this->privates['setup_mkdir'] = new \byrokrat\giroapp\Filesystem\FilesystemConfigurator([0 => '.'])))->createFiles($a);

        return $this->privates['file_export_dumper'] = new \byrokrat\giroapp\Listener\FileDumpingListener($a, ($this->privates['byrokrat\giroapp\Filesystem\RenamingProcessor'] ?? $this->getRenamingProcessorService()));
    }

    /**
     * Gets the private 'file_import_dumper' shared autowired service.
     *
     * @return \byrokrat\giroapp\Listener\FileDumpingListener
     */
    protected function getFileImportDumperService()
    {
        $a = ($this->privates['byrokrat\giroapp\Filesystem\FilesystemFactory'] ?? $this->getFilesystemFactoryService())->createFilesystem(($this->services['ini'] ?? $this->getIniService())->getConfigValue("imports_dir"));
        ($this->privates['setup_mkdir'] ?? ($this->privates['setup_mkdir'] = new \byrokrat\giroapp\Filesystem\FilesystemConfigurator([0 => '.'])))->createFiles($a);

        return $this->privates['file_import_dumper'] = new \byrokrat\giroapp\Listener\FileDumpingListener($a, ($this->privates['byrokrat\giroapp\Filesystem\RenamingProcessor'] ?? $this->getRenamingProcessorService()));
    }

    /**
     * Gets the private 'fs_cwd' shared autowired service.
     *
     * @return \byrokrat\giroapp\Filesystem\StdFilesystem
     */
    protected function getFsCwdService()
    {
        return $this->privates['fs_cwd'] = new \byrokrat\giroapp\Filesystem\StdFilesystem('.', ($this->privates['Symfony\Component\Filesystem\Filesystem'] ?? ($this->privates['Symfony\Component\Filesystem\Filesystem'] = new \Symfony\Component\Filesystem\Filesystem())));
    }

    /**
     * Gets the private 'organization_bg' shared autowired service.
     *
     * @return \byrokrat\banking\AccountNumber
     */
    protected function getOrganizationBgService()
    {
        return $this->privates['organization_bg'] = (new \byrokrat\banking\BankgiroFactory())->createAccount(($this->services['ini'] ?? $this->getIniService())->getConfigValue("org_bg"));
    }

    public function getParameter($name)
    {
        $name = (string) $name;

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'env(GIROAPP_INI)' => 'giroapp.ini',
        ];
    }
}

class DonorQueryDecorator_48491f1 extends \byrokrat\giroapp\Db\DonorQueryDecorator implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolderf70ac = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer8aaf0 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties3c2d1 = [
        
    ];

    public function findAll() : \byrokrat\giroapp\Model\DonorCollection
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, 'findAll', array(), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        return $this->valueHolderf70ac->findAll();
    }

    public function findByMandateKey(string $mandateKey) : ?\byrokrat\giroapp\Model\Donor
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, 'findByMandateKey', array('mandateKey' => $mandateKey), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        return $this->valueHolderf70ac->findByMandateKey($mandateKey);
    }

    public function requireByMandateKey(string $mandateKey) : \byrokrat\giroapp\Model\Donor
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, 'requireByMandateKey', array('mandateKey' => $mandateKey), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        return $this->valueHolderf70ac->requireByMandateKey($mandateKey);
    }

    public function findByPayerNumber(string $payerNumber) : ?\byrokrat\giroapp\Model\Donor
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, 'findByPayerNumber', array('payerNumber' => $payerNumber), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        return $this->valueHolderf70ac->findByPayerNumber($payerNumber);
    }

    public function requireByPayerNumber(string $payerNumber) : \byrokrat\giroapp\Model\Donor
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, 'requireByPayerNumber', array('payerNumber' => $payerNumber), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        return $this->valueHolderf70ac->requireByPayerNumber($payerNumber);
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\byrokrat\giroapp\Db\DonorQueryDecorator $instance) {
            unset($instance->decorated);
        }, $instance, 'byrokrat\\giroapp\\Db\\DonorQueryDecorator')->__invoke($instance);

        $instance->initializer8aaf0 = $initializer;

        return $instance;
    }

    public function __construct(\byrokrat\giroapp\Db\DonorQueryInterface $decorated)
    {
        static $reflection;

        if (! $this->valueHolderf70ac) {
            $reflection = $reflection ?? new \ReflectionClass('byrokrat\\giroapp\\Db\\DonorQueryDecorator');
            $this->valueHolderf70ac = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\byrokrat\giroapp\Db\DonorQueryDecorator $instance) {
            unset($instance->decorated);
        }, $this, 'byrokrat\\giroapp\\Db\\DonorQueryDecorator')->__invoke($this);

        }

        $this->valueHolderf70ac->__construct($decorated);
    }

    public function & __get($name)
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, '__get', ['name' => $name], $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        if (isset(self::$publicProperties3c2d1[$name])) {
            return $this->valueHolderf70ac->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf70ac;

            $backtrace = debug_backtrace(false);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    get_parent_class($this),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
            return;
        }

        $targetObject = $this->valueHolderf70ac;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf70ac;

            return $targetObject->$name = $value;
            return;
        }

        $targetObject = $this->valueHolderf70ac;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, '__isset', array('name' => $name), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf70ac;

            return isset($targetObject->$name);
            return;
        }

        $targetObject = $this->valueHolderf70ac;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, '__unset', array('name' => $name), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf70ac;

            unset($targetObject->$name);
            return;
        }

        $targetObject = $this->valueHolderf70ac;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __clone()
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, '__clone', array(), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        $this->valueHolderf70ac = clone $this->valueHolderf70ac;
    }

    public function __sleep()
    {
        $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, '__sleep', array(), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;

        return array('valueHolderf70ac');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\byrokrat\giroapp\Db\DonorQueryDecorator $instance) {
            unset($instance->decorated);
        }, $this, 'byrokrat\\giroapp\\Db\\DonorQueryDecorator')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer8aaf0 = $initializer;
    }

    public function getProxyInitializer()
    {
        return $this->initializer8aaf0;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer8aaf0 && ($this->initializer8aaf0->__invoke($valueHolderf70ac, $this, 'initializeProxy', array(), $this->initializer8aaf0) || 1) && $this->valueHolderf70ac = $valueHolderf70ac;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderf70ac;
    }

    public function getWrappedValueHolderValue() : ?object
    {
        return $this->valueHolderf70ac;
    }


}
