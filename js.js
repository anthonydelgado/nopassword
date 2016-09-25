// API response
controller.hears(['API','api'],'direct_mention,direct_message',function(bot,message) {

    controller.storage.users.get(message.user, function(err, user) {

        if (!user) {
            user = {
                id: message.user,
                list: []
            }
        }

        if (!user.list || !user.list.length) {
            user.list = [
                {
                    'id': 1,
                    'name': 'autocad'
                    'pass': 'DeICV4f0grvKiTPjyfcVEfE'
                },
                {
                    'id': 2,
                    'name': 'slack'
                    'pass': 'xoxb-83607640643-8NfAoewLnCMRYxUk'
                },
                {
                    'id': 3,
                    'name': 'google maps'
                    'text': 'AIzaSyCbTv3BkBJNDeICV4f0grv'
                }
            ]
        }
      });
  });