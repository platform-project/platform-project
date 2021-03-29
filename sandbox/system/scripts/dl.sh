#!/bin/bash
PLATFORM_PATH="/platform"
PLATFORM_SANDBOX_PATH="${PLATFORM_PATH}/sandbox"
PLATFORM_SANDBOX_WORKSPACE_PATH="${PLATFORM_SANDBOX_PATH}/workspace"
TENSORFLOW_PATH="${PLATFORM_SANDBOX_WORKSPACE_PATH}/tensorflow"

sudo -k

install_dependencies()
{
    sudo apt-get install python-pip python-dev python-virtualenv
    # sudo apt-get install python3-pip python3-dev python-virtualenv
}

setup_environment()
{
    virtualenv --system-site-packages
    # virtualenv --system-site-packages -p python3
}

install_tensorflow()
{
    source ${TENSORFLOW_PATH}/bin/activate            # bash, sh, ksh, or zsh
    # source ${TENSORFLOW_PATH}/bin/activate.csh        # csh or tcsh

    easy_install -U pip
    pip install --upgrade tensorflow
    pip install --upgrade tensorflow-gpu
    # pip3 install --upgrade tensorflow
    # pip3 install --upgrade tensorflow-gpu
}

uninstall_tensorflow()
{
    rm -rf ${TENSORFLOW_PATH}
}

initialize_environment()
{
    source ${TENSORFLOW_PATH}/bin/activate
}

deactivate_environment()
{
    deactivate 
}
