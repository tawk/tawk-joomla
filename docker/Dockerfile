ARG JOOMLA_IMAGE_VERSION

FROM joomla:${JOOMLA_IMAGE_VERSION}

ARG JOOMLA_DB_HOST_ARG \
	JOOMLA_DB_USER_ARG \
	JOOMLA_DB_PASSWORD_ARG \
	JOOMLA_DB_NAME_ARG

ENV JOOMLA_DB_HOST=${JOOMLA_DB_HOST_ARG} \
	JOOMLA_DB_USER=${JOOMLA_DB_USER_ARG} \
	JOOMLA_DB_PASSWORD=${JOOMLA_DB_PASSWORD_ARG} \
	JOOMLA_DB_NAME=${JOOMLA_DB_NAME_ARG}

COPY --chown=www-data:www-data ./bin/tawkto/mod_tawkto /var/www/html/modules/mod_tawkto
COPY --chown=www-data:www-data ./bin/tawkto/plg_tawkto /var/www/html/plugins/system/tawkto

