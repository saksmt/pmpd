<?php

namespace Smt\Pmpd\Connection;

use Smt\Util\Enumeration\EnumerationTrait;

/**
 * Available commands (see reference in MPD documentation)
 * @package Smt\Pmpd\Connection
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class Commands
{
    const ADD = 'add';
    const ADD_AND_RETURN_ID = 'addid';
    const ADD_BY_TAG_ID = 'addtagid';
    const CHANNELS_LIST = 'channels';
    const CLEAR = 'clear';
    const CLEAR_ERROR = 'clearerror';
    const CLEAR_TAG_ID = 'cleartagid';
    const CLOSE = 'close';
    const COMMANDS_LIST = 'commands';
    const GET_CONFIG = 'config';
    const CONSUME = 'consume';
    const GET_COUNT = 'count';
    const SET_CROSSFADE = 'crossfade';
    const CURRENT = 'currentsong';
    const DECODERS_LIST = 'decoders';
    const DELETE = 'delete';
    const DELETE_BY_ID = 'deleteid';
    const DISABLE_OUTPUT = 'disableoutput';
    const ENABLE_OUTPUT = 'enableoutput';
    const FIND = 'find';
    const FIND_AND_ADD = 'findadd';
    const IDLE = 'idle';
    const KILL_DAEMON = 'kill';
    const LIST_TRACKS = 'list';
    const LIST_ALL = 'listall';
    const LIST_ALL_WITH_INFO = 'listallinfo';
    const LIST_FILES = 'listfiles';
    const LIST_MOUNTS = 'listmounts';
    const LIST_PLAYLIST = 'listplaylist';
    const LIST_PLAYLIST_WITH_INFO = 'listplaylistinfo';
    const LIST_PLAYLISTS = 'listplaylists';
    const LOAD = 'load';
    const LS_INFO = 'lsinfo';
    const SET_MIXRAMPDB = 'mixrampdb';
    const SET_MIXRAMPDELAY = 'mixrampdelay';
    const MOUNT = 'mount';
    const MOVE = 'move';
    const MOVE_BY_ID = 'moveid';
    const NEXT = 'next';
    const NOT_ALLOWED_COMMANDS_LIST = 'notcommands';
    const OUTPUTS_LIST = 'outputs';
    const PASSWORD = 'password';
    const PAUSE = 'pause';
    const PING = 'ping';
    const PLAY = 'play';
    const PLAY_BY_ID = 'playid';
    const LIST_CURRENT_PLAYLIST = 'playlist';
    const ADD_TO_PLAYLIST = 'playlistadd';
    const CLEAR_PLAYLIST = 'playlistclear';
    const DELETE_PLAYLIST = 'playlistdelete';
    const FIND_IN_PLAYLIST = 'playlistfind';
    const LIST_PLAYLIST_WITH_ID = 'playlistid';
    const LIST_CURRENT_PLAYLIST_WITH_INFO = 'playlistinfo';
    const MOVE_PLAYLIST = 'playlistmove';
    const SEARCH_IN_PLAYLIST = 'playlistsearch';
    const DISPLAY_PLAYLIST_CHANGES = 'plchanges';
    const DISPLAY_PLAYLIST_CHANGES_ID = 'plchangesposid';
    const PREVIOUS = 'previous';
    const SET_PRIORITY = 'prio';
    const SET_PRIORITY_BY_ID = 'prioid';
    const TOGGLE_RANDOM = 'random';
    const SET_REPEAT_RANGE_BY_ID = 'rangeid';
    const READ_COMMENTS = 'readcomments';
    const READ_MESSAGES = 'readmessages';
    const RENAME = 'rename';
    const TOGGLE_REPEAT = 'repeat';
    const SET_REPLAY_GAIN_MODE = 'replay_gain_mode';
    const SET_REPLAY_GAIN_STATUS = 'replay_gain_status';
    const RESCAN = 'rescan';
    const RM = 'rm';
    const SAVE = 'save';
    const SEARCH = 'search';
    const SEARCH_AND_ADD = 'searchadd';
    const SEARCH_AND_ADD_TO_PLAYLIST = 'searchaddpl';
    const SEEK = 'seek';
    const SEEK_CURRENT = 'seekcur';
    const SEEK_TO_ID = 'seekid';
    const SEND_MESSAGE = 'sendmessage';
    const SET_VOLUME = 'setvol';
    const TOGGLE_SHUFFLE = 'shuffle';
    const TOGGLE_SINGLE = 'single';
    const GET_STATS = 'stats';
    const GET_STATUS = 'status';
    const STOP = 'stop';
    const SUBSCRIBE = 'subscribe';
    const SWAP = 'swap';
    const SWAP_BY_ID = 'swapid';
    const GET_TAG_TYPES = 'tagtypes';
    const TOGGLE_OUTPUT = 'toggleoutput';
    const UNMOUNT = 'unmount';
    const UNSUBSCRIBE = 'unsubscribe';
    const UPDATE = 'update';
    const LIST_URL_HANDLERS = 'urlhandlers';
    const CHANGE_VOLUME = 'volume';

    use EnumerationTrait;
}
