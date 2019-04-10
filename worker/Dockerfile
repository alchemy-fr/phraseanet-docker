FROM phraseanet

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        supervisor \
    && rm -rf /var/lib/apt/lists/* \
    && mkdir -p /var/log/supervisor \
    && chown -R app: /var/log/supervisor

COPY supervisor-phraseanet-scheduler.conf /etc/supervisor/conf.d/scheduler-phraseanet.conf

ENTRYPOINT []

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
