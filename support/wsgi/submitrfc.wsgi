
from cgi import parse_qs, escape
from string import Template
import os

import json, yaml

#rfc_template=Template(file("rfc_template.htm").read()).substitute





def application(environ, start_response):
    status = '200 OK'
    #elist=["%s: %s\n" % (k, environ[k]) for k in environ.keys()]

    request_body_size = int(environ.get('CONTENT_LENGTH', 0))
    request_body=environ['wsgi.input'].read(request_body_size)
    d = parse_qs(request_body)

    keymap=[
        ('CHANGEOWNERNAME' , 'owner'),
	('DESCRIPTION' , 'description'),
        ('SUMMARY' , 'summary'),
        ('SERVICES_AFFECTED' , 'services_affected'),
        ('TEAM'             , 'team'),
        ('PLANNED_DATE'     , 'planned_date'),
        ('PLANNED_TIME'     , 'planned_time'),
        ('DURATION'         , 'duration'),
        ('TEST_PLAN'                , 'testplan'),
        ('BACKOUT_PLAN'     , 'backoutplan'),
        ('COMMUNICATION_PLAN' , 'communicationplan'),
        ('LINKS'             , 'links')
    ]

    rfctemplate=Template(file("/www/dev.rc.hms.harvard.edu/support/wsgi/rfc_template.htm").read()).substitute

    subs={}
    for rk, wk in keymap:
        if wk not in d.keys():
            subs.setdefault(rk, '')
        else:
            subs.setdefault(rk, escape(d[wk][0]))

    f=open("/www/dev.rc.hms.harvard.edu/docroot/HMS-IT/rfc.output.htm", "w")
    f.write(rfctemplate(subs))
    f.close()
    #output = '%s' % json.dumps(d, indent=2)
    output = '%s' % yaml.dump(d, indent=2)
    
    response_headers = [('Content-type', 'text/plain'),
                        ('Content-Length', str(len(output)))]
    start_response(status, response_headers)
    return [output]

