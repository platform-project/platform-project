var vseed = 0;
var clips = {
  format: ['.mp4', '.webm'],
  source: [
    'assets/videos/00',
    'assets/videos/01',
    'assets/videos/02',
    'assets/videos/03',
    'assets/videos/04',
    'assets/videos/05',
    'assets/videos/06',
    'assets/videos/07',
    'assets/videos/08',
    'assets/videos/09',
    'assets/videos/10',
    'assets/videos/11',
    'assets/videos/12',
    'assets/videos/13',
    'assets/videos/14',
    'assets/videos/15',
  ]
};

function getClips(clip, index, ext){
  if (index == null || index == '' || index == 'undefined'){
    index = 0;
  }

  if (ext == null || ext == '' || ext == 'undefined'){
    ext = 0;
  }

  return clip.source[index] + clip.format[ext];
}

vseed = Math.floor(Math.random() * clips.source.length);
clip = getClips(clips, vseed, 0);
enabled = true;
if (enabled) {
  $('video#bgvid').prop('src', clip);
  $('video#bgvid source').prop('src', clip);
}
console.log(clip);
