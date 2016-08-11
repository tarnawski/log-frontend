<?php

namespace LogFrontendBundle\Controller;

use LogFrontendBundle\Auth\HostAuth;
use LogFrontendBundle\Exception\WriterException;
use LogFrontendBundle\Model\Log;
use LogFrontendBundle\Writer\LogWriter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use LogFrontendBundle\Form\Type\LogType;

class LogController extends BaseController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        /** @var HostAuth $authService */
        $authService = $this->get('log_frontend.auth');
        if (!$authService->isGranted($request->getHost())) {
            return JsonResponse::create([
                'status' => 'ACCESS DENIED',
                'message' => sprintf("Host: '%s' not contains in access control list", $request->getHost())
            ], 401);
        }

        $form = $this->createForm(LogType::class);
        $submittedData = json_decode($request->getContent(), true);
        $form->submit($submittedData);

        if (!$form->isValid()) {
            return JsonResponse::create($this->getFormErrorsAsArray($form), 400);
        }
        /** @var Log $log */
        $log = $form->getData();
        /** @var LogWriter $logWriter */
        $logWriter = $this->get('log_frontend.writer');

        try {
            $logWriter->writeLog($log);
        } catch (WriterException $e){
            return JsonResponse::create(['status' => 'ERROR', 'message' => $e->getMessage()], 400);
        }

        return JsonResponse::create(['status' => 'SUCCESS', 'message' => 'Log saved!'], 200);

    }
}
